<?php

namespace App\Http\Controllers\Frontend\UserAuth;

use App\Models\User;
use Validator;
use Response;
use App\Http\Controllers\FrontendController;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name'     => 'required|max:18|min:4|unique:users,name|alpha_dash',
            'password' => 'required|min:5|confirmed|alpha_dash',
            'captcha'  => 'required|captcha|integer',
        ],[
            'name.required'       => '用户名不能为空!',
            'name.alpha_dash'     => '用户名由字母、数字、中划线或下划线字符构成!',
            'name.unique'         => '用户名已存在!',
            'name.max'            => '最长值不能超过18个字符',
            'name.min'            => '最短值不能小于4个字符',
            'password.required'   => '密码不能为空',
            'password.alpha_dash' => '密码由字母、数字、中划线或下划线字符构成!',
            'password.min'        => '密码最短不能小于5个字符',
            'password.confirmed'  => '密码和确认密码不一致',
            'captcha.required'    => '验证码不能为空',
            'captcha.captcha'     => '验证码不正确',
        ]);

        if ($validator->fails()) {
            return $validator->errors()->first();
        } else {
            return true;
        }
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $message = ['status' => false, 'message' => ""];
        $validator = $this->validator($request->all());

        if ($validator !== true) {
            $message['message'] = $validator;
            return Response::json($message);
        }

        $type = $request->get('type');
        if (isset($type) && !empty($type)) {
            event(new Registered($user = $this->createDoctor($request->all())));
        } else {
            event(new Registered($user = $this->create($request->all())));
        }

        $this->guard()->login($user);

        $message = ['status' => true, 'message' => "注册成功"];
        return Response::json($message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function createDoctor(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->type = 1;
        $user->api_token = str_random(60);
        $user->password = bcrypt($data['password']);
        $user->save();

        UserStore::addById($user->id);

        return $user;
//        return User::create([
//            'name'      => $data['name'],
//            'type'      => 1,
//            'api_token' => str_random(60),
//            'password'  => bcrypt($data['password']),
//        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->api_token = str_random(60);
        $user->password = bcrypt($data['password']);
        $user->save();

        UserStore::addById($user->id);
        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('Frontend.User.Web.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}
