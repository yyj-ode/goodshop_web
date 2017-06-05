<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\OfficeBuilding;

class OfficeBuildingApiController extends ApiController
{
    /**
     * @ApiDescription(section="OfficeBuilding", description="获取地区信息")
     * @ApiMethod(type="get")
     * @ApiHeaders(name="...", type="...", nullable=..., description="...")
     * @ApiRoute(name="/api/officebuilding/index")
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
        $OfficeBuilding = new OfficeBuilding();
        $data['longitude'] = $request->get('longitude',null);
        $data['latitude'] = $request->get('latitude',null);
        $data['office_name'] = $request->get('office_name',null);
        $data['office_address'] = $request->get('office_address',null);
        $data['company_categories'] = $request->get('company_categories',null);
        $data['rent_rate'] = $request->get('rent_rate',null);
        $res= $OfficeBuilding->addData($OfficeBuilding,$data);
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
