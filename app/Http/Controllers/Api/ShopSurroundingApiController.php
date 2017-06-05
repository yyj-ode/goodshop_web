<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Store\ShopSurroundingStore;

class ShopSurroundingApiController extends ApiController
{
    /**
     * @ApiDescription(section="ShopSurrounding", description="周边店铺")
     * @ApiMethod(type="post")
     * @ApiHeaders(name="...", type="...", nullable=..., description="...")
     * @ApiRoute(name="/api/shopsurrounding/index")
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
     *  'status': 'success',
     *  'message': '操作成功！',
     *  'status_code': '200',
     * }")
     * @ApiBody(sample="...")
     */
    public function index(Request $request)
    {

        $model = new ShopSurroundingStore();

        $data = [
            'province' => $request->get(''),
            'city' => $request->get(''),
            'county' => $request->get('cityName'),
            'address' => $request->get('address'),
            'shop_type' => $request->get('shopTypeName'),
            'business_district' => $request->get('businessDistrict'),
            'categories_id' => $request->get('mainCategoryId'),
            'categories' => $request->get('mainCategoryName'),
            'shop_name' => $request->get('shopName'),
            'shop_branch_name' => $request->get('shopBranchName'),
            'price' => $request->get('price'),
            'longitude' => $request->get('longitude'),
            'latitude' => $request->get('latiitude'),
        ];

        $result = $model::addData($model, $data);

        if ($result) {
            return ['status' => 'success', 'message' => '操作成功！', 'status_code' => '200'];
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
