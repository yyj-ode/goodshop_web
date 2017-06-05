<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Format;

class FormatApiController extends ApiController
{
    /**
     * @ApiDescription(section="Format", description="店铺类型")
     * @ApiMethod(type="get")
     * @ApiHeaders(name="...", type="...", nullable=..., description="...")
     * @ApiRoute(name="/api/format/index")
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
     *  'status': 'success',
     *  'message': '操作成功！',
     *  'status_code': '200',
     *  'data':[
     *          {
     *          'id': 1,
     *          'name': '商业街商铺'
     *        }
     *     ]
     * }")
     * @ApiBody(sample="...")
     */
    public function index(Request $request)
    {
        $result = Format::where(['show' => 1])->get();
        if ($result) {
            $data = [];
            foreach ($result as $key => $value) {
                $data[] = [
                    'id' => $value->id,
                    'name' => $value->name,
                ];
            }
            //返回200响应码，并且返回status为success的标识
            return ['status' => 'success', 'message' => '操作成功！', 'status_code' => '200', 'data' => $data];
        } else {
            //返回200响应码，并且返回status为success的标识
            return ['status' => 'error', 'message' => '数据请求失败！', 'status_code' => '404'];
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
