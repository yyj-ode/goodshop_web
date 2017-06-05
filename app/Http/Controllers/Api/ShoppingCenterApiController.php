<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\ShoppingCenter;

class ShoppingCenterApiController extends ApiController
{
    /**
     * @ApiDescription(section="ShoppingCenter", description="获取地区信息")
     * @ApiMethod(type="get")
     * @ApiHeaders(name="...", type="...", nullable=..., description="...")
     * @ApiRoute(name="/api/shoppingcenter/index")
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
        $ShoppingCenter = new ShoppingCenter();

        $data['project_name'] = $request->get('project_name',null);
        $data['opening_date'] = $request->get('opening_date',null);
        $data['condition'] = $request->get('condition',null);
        $data['commercial_area'] = $request->get('commercial_area',null);
        $data['commercial_floors'] = $request->get('commercial_floors',null);
        $data['project_adress'] = $request->get('project_adress',null);
        $data['project_photo'] = $request->get('project_photo',null);
        $data['project_mapping'] = $request->get('project_mapping',null);
        $data['contact_brand'] = $request->get('contact_brand',null);
        $data['demand'] = $request->get('demand',null);
        $data['inner_map'] = $request->get('inner_map',null);

        $res= $ShoppingCenter->addData($ShoppingCenter,$data);
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
