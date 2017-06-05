<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Village;

class VillageApiController extends ApiController
{
    /**
     * @ApiDescription(section="Village", description="获取地区信息")
     * @ApiMethod(type="get")
     * @ApiHeaders(name="...", type="...", nullable=..., description="...")
     * @ApiRoute(name="/api/village/index")
     * @ApiParams(name="area", type="integer", nullable=false, description="area",sample="{'area':'11'}})
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
     *  'status': 'success',
     *  'message': '操作成功',
     *  'status_code': '200',
     *  'data': [
     *   {
     *     'id': 1101,
     *     'name': '东城',
     *   }
     *  ]
     * }")
     * @ApiBody(sample="...")
     */
    public function index(Request $request)
    {
        $result = ['status' => 'error', 'message' => '数据请求失败！', 'status_code' => '404'];
        $Village = new Village();

        $data['longitude'] = $request->get('longitude',null);
        $data['latituede'] = $request->get('latituede',null);
        $data['community_name'] = $request->get('community_name',null);
        $data['community_adress'] = $request->get('community_adress',null);
        $data['building_age'] = $request->get('building_age',null);
        $data['building_category'] = $request->get('building_category',null);
        $data['property_management_fee'] = $request->get('property_management_fee',null);
        $data['property_management_company'] = $request->get('property_management_company',null);
        $data['developer'] = $request->get('developer',null);
        $data['total_building_number'] = $request->get('total_building_number',null);
        $data['total_apartment_number'] = $request->get('total_apartment_number',null);
        $data['price'] = $request->get('price',null);

        $res= $Village->addData($Village,$data);
        if ($res) {
            $result = ['status' => true, 'message' => '保存成功!'];
        }

        return ['status' => 'success', 'message' => '操作成功！', 'status_code' => '200', 'result' => $result];
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
