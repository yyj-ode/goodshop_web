<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Price;

class PriceApiController extends ApiController
{
    /**
     * @ApiDescription(section="Price", description="开店预算")
     * @ApiMethod(type="get")
     * @ApiHeaders(name="...", type="...", nullable=..., description="...")
     * @ApiRoute(name="/api/price/index")
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
     *  'status': 'success',
     *  'message': '操作成功！',
     *  'status_code': '200',
     *  'data':[
     *          {
     *          'id': 1,
     *          'area': '0~50万元'
     *        }
     *     ]
     * }")
     * @ApiBody(sample="...")
     */
    public function index(Request $request)
    {
        $result = Price::where(['show' => 1])->get();
        if ($result) {
            $data = [];
            foreach ($result as $key => $value) {
                $data[] = [
                    'id' => $value->id,
                    'area' => $value->min_price . '~' . $value->max_price . '万元',
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
