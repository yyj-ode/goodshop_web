<?php

namespace App\Http\Controllers\Frontend\UserAuth;

use App\Http\Controllers\FrontendController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use Auth;
use URL;
use Validator;
use Cookie;
use Log;
use Illuminate\Http\Request;
use App\Models\User;
use ActionLog;
use Response;
use App\Models\Sms;
use App\Utils\AES;
use App\Utils\Common;

class LoginController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $username = 'mobile';

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        if ($request->get('email') && filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $this->username = "email";
        }
        $this->middleware('user.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $callbackUrl = url()->previous();

        if (url('user/logout') != $callbackUrl || url('user/register.html') != $callbackUrl || url('doctor/register.html') != $callbackUrl || url('captcha/flat') != $callbackUrl) {
            Session::put('LOGIN_CALLBACK_URL', $callbackUrl);
        }

        return view('Frontend.User.Web.auth.login');
    }

    public function username()
    {
        return $this->username;
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
        ]);
    }


    public function login(Request $request)
    {
        if ($request->get('username') && filter_var($request->get('username'), FILTER_VALIDATE_EMAIL)) {
            session(['login_username' => 'email']);
            $request->merge(['email' => $request->get('username')]);

            if ($request->get('email') && filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
                $auth_attempt = Auth::guard('user')->attempt([$this->username() => $request->get('email'), 'password' => $request->get('password')]);
            } else {
                $auth_attempt = Auth::guard('user')->attempt([$this->username() => $request->get('mobile'), 'password' => $request->get('password')]);
            }

            $this->validateLogin($request);

            if ($auth_attempt) {

                /**
                 * 记录登录日志 操作日志自动记录
                 */
                $type = 'login';
                $content = "用户登录";
                //ActionLog::createActionLog($type, $content);

                if ($this->hasTooManyLoginAttempts($request)) {
                    $this->fireLockoutEvent($request);
                    return $this->sendLockoutResponse($request);
                }

                if ($this->attemptLogin($request)) {
                    $user = User::where('mobile', $request->get('username'))->first();
                    $result = ['id' => $user->id, 'mobile' => $user->mobile, 'email' => $user->email];
                    Session::put('USER_DATA', $result);
                    return $this->sendLoginResponse($request);
                }

                $this->incrementLoginAttempts($request);
                return $this->sendFailedLoginResponse($request);
            } else {
                return redirect()->back()->withErrors([$this->username() => '用户名或密码错误!']);
            }
        }
    }


    public function redirectPath()
    {

        if (Session::exists('LOGIN_CALLBACK_URL')) {
            $this->redirectTo = Session::get('LOGIN_CALLBACK_URL');
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user()) ?: redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        if ($this->guard()->check()) {
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
        }
        return Redirect::to('user/login');
    }


    public function ajaxLogout(Request $request)
    {
        $result = Session::get('USER_DATA');
        if ($this->guard()->check() || !empty($result)) {
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
        }
        $result = ['status' => 200];
        return response()->json($result);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * 用户登录  手机号和密码登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxLogin(Request $request)
    {
        $validation = $this->validator($request->all());
        if ($validation->fails()) {
            return response()->json(['message' => $validation->errors()->toArray(), 'status' => 500], 200);
        }

        $credentials = $request->only($this->username(), 'password');
        $authSuccess = Auth::attempt($credentials, $request->has('remember'));

        //登录成功处理
        if ($authSuccess) {

            $this->sendLoginResponse($request);

            $user = User::where('mobile', $request->get('mobile'))->first();
            $result = ['id' => $user->id, 'mobile' => $user->mobile, 'email' => $user->email];
            Session::put('USER_DATA', $result);
            return response()->json(['SUCCESS' => 'EMAIL_SENT', 'status' => 200], 200);
        } else {
            return response()->json(['ERROR' => 'EMAIL_NOT_FOUND', 'status' => 500], 200);
        }
    }

    /**
     * 用户登录  用户手机号和验证码登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax(Request $request)
    {
        $mobile = $request->get('mobile');
        $sms_code = $request->get('sms_code');
        $validator = Validator::make($request->all(), [
            'sms_code' => 'required',
            'mobile' => 'required|regex:/^1[34578][0-9]{9}$/',
        ], [
            'sms_code.required' => '手机号和验证码不能为空！',
            'mobile.required' => '手机号和验证码不能为空！',
            'mobile.regex' => '手机号不正确！',
        ]);
        //数据验证
        if ($validator->fails()) {
            $message = $validator->getMessageBag()->first();
            return response()->json(['message' => $message, 'status' => 500], 200);
        }

        $sms = new Sms();
        $checkData = $sms::check($mobile,$sms_code);
        if(count($checkData)){
            //登录成功处理
            if ($sms_code == $checkData->code) {
                $user = User::where(['mobile' => $mobile])->first();

                if ($user) {
                    $result = ['id' => $user->id, 'mobile' => $user->mobile, 'email' => $user->email];
                    Session::put('USER_DATA', $result);
                } else {
                    $user = new User();
                    $user->mobile = $mobile;
                    $user->save();

                    $result = ['id' => $user->id, 'mobile' => $user->mobile, 'email' => $user->email];
                    Session::put('USER_DATA', $result);
                }

                $this->sendLoginResponse($request);
                return response()->json(['message' => '登录成功！', 'status' => 200, 'user' => $result], 200);
            }else{
                return response()->json(['message' => '验证码已过期, 请重新发送给验证码！', 'status' => 500], 200);
            }
        }else{
            return response()->json(['message' => '手机号码或验证码错误或验证码已过期！', 'status' => 500], 200);
        }

    }

    /**
     * 发送短息
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendSMS(Request $request)
    {
        $mobile = $request->get('mobile');
        if (isMobile($mobile)) {
            $code = makeCaptchaCode();
            $json_data = json_encode(['name' => $code]);
            $template = 'SMS_62295039';
            $sms = new Sms();
            $checkData = $sms::checkMinute($mobile);
            if ($checkData == false) {
                $data = sendSms($mobile, $template, $json_data);
                $result = json_decode($data, true);
                if ($result['status'] == 200) {
                    $sms = new Sms();
                    $sms->mobile = $mobile;
                    $sms->code = $code;
                    $sms->status = 1;
                    $sms->save();
                    $result = ['status' => 1, 'message' => "验证码发送成功！", $data];
                } else {
                    $result = ['status' => 0, 'message' => "验证码发送失败！", $data];
                }
            } else {
                $result = ['status' => 1, 'message' => "刚发的验证码还未失效，还能使用！"];
            }
        } else {
            $result = ['status' => 0, 'message' => '手机号码有误，请重新输入！'];
        }
        return response()->json($result);
    }

    public function checkLogin(Request $request)
    {
        $result = Session::get('USER_DATA');
        if (!empty($result)) {
            $result = ['status' => 200];
        } else {
            $result = ['status' => 500];
        }

        return response()->json($result);
    }
}
