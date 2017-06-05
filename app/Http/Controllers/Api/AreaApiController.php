<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Area;

class AreaApiController extends ApiController
{
    /**
     * @ApiDescription(section="Area", description="获取地区信息")
     * @ApiMethod(type="get")
     * @ApiHeaders(name="...", type="...", nullable=..., description="...")
     * @ApiRoute(name="/api/area/index")
     * @ApiParams(name="parent_id", type="integer", nullable=false, description="parent_id",sample="{'parent_id':'11'}})
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
        $parent_id = $request->get('parent_id', '11');

        $area = Area::getByParentId($parent_id);
        $data = [];

        if ($area) {
            $parent_ids = [];

            foreach ($area as $key => $value) {
                $parent_ids[] = $value->id;
            }

            $areaData = Area::getByParentIds($parent_ids);

            foreach ($area as $key => $value) {
                $data[$key] = [
                    'id' => $value->id,
                    'name' => $value->name,
                ];
                foreach ($areaData as $item) {
                    if($item->parent_id == $value->id){
                        $data[$key]['data'][] = [
                            'id' => $item->id,
                            'name' => $item->name,
                        ];
                    }
                }
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
