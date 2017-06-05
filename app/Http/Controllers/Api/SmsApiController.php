<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Sms;

class SmsApiController extends ApiController
{
    /**
     * @ApiDescription(section="Sms", description="发送短息验证码")
     * @ApiMethod(type="post")
     * @ApiHeaders(name="...", type="...", nullable=..., description="...")
     * @ApiRoute(name="/api/sms/send")
     * @ApiParams(name="mobile", type="integer", nullable=false, description="手机号码",sample="{'mobile':'13911052021'}}")
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
     *  'status': 'success',
     *  'message': '验证码发送成功！',
     *  'status_code': '200',
     * }")
     * @ApiBody(sample="...")
     */
    public function send(Request $request)
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
                    return ['status' => 'success', 'message' => '验证码发送成功！', 'status_code' => '200'];
                } else {
                    return ['status' => 'error', 'message' => '验证码发送失败！', 'status_code' => '404'];
                }
            } else {
                return ['status' => 'success', 'message' => '刚发的验证码还未失效，还能使用。', 'status_code' => '200'];
            }
        } else {
            return ['status' => 'error', 'message' => '手机号码有误，请重新输入！', 'status_code' => '404'];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
