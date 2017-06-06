<?php
namespace App\Store;

use App\Models\ShoppingCenter;
use App\Models\ShopSurrounding;
use Carbon\Carbon;
use App\Utils\Common;
use Log;
use App\Models\OfficeBuilding;

class SurroundNumStore extends BaseStore
{
    protected $connection = 'mongodb';
    protected $table = 'binli_shopline';

    protected $fillable = [
        'user_id', //用户ID
    ];

    public static function getSurroundOfficeBuildingNum($longitude,$latitude,$kilometer){
        $officebuidingModel = new OfficeBuilding();
        $where = [
            'loc' => [
                '$geoWithin' => [
                    '$centerSphere' => [
                        [
                            $longitude,
                            $latitude,
                        ],
                        $kilometer/6371
                    ]
                ]
            ],
        ];
        return $officebuidingModel::whereRaw($where)->count();
    }

    public static function getSurroundVillageNum($longitude,$latitude,$kilometer){
        $villageModel = new VillageStore();
        $where = [
            'loc' => [
                '$geoWithin' => [
                    '$centerSphere' => [
                        [
                            $longitude,
                            $latitude,
                        ],
                        $kilometer/6371
                    ]
                ]
            ],
        ];
//        平面检测直线距离，暂时来看，没有问题
//        $data = $villageModel::whereRaw($where)->get()->toArray();
//        $arr = [];
//        foreach($data as $k => $v){
//            $n = ['x'=> $v['loc']['longitude']-116.423,'y'=> $v['loc']['latitude']-39.944];
//            $arr[] = ($n['x']*$n['x'] + $n['y']*$n['y'])*10000;
//        }
//        dd($arr);
        return $villageModel::whereRaw($where)->count();
    }

    public static function getSurroundShoppingCentergNum($longitude,$latitude,$kilometer){
        $shoppingcenterModel = new ShoppingCenter();
        $where = [
            'loc' => [
                '$geoWithin' => [
                    '$centerSphere' => [
                        [
                            $longitude,
                            $latitude,
                        ],
                        $kilometer/6371
                    ]
                ]
            ],
        ];
        return $shoppingcenterModel::whereRaw($where)->count();
    }

    public static function getSurroundShopNum($longitude,$latitude,$kilometer){
        $shopsurroundingModel = new ShopSurrounding();
        $where = [
            'loc' => [
                '$geoWithin' => [
                    '$centerSphere' => [
                        [
                            $longitude,
                            $latitude,
                        ],
                        $kilometer/6371
                    ]
                ]
            ],
        ];
        return $shopsurroundingModel::whereRaw($where)->count();
    }

    /**
     * 查找周边信息，给地图使用
     * @param $longitude
     * @param $latitude
     * @param $kilometer
     * @param $condition 周边的condition，字符串，可以ShopSurrounding，ShoppingCenter，VillageStore，OfficeBuilding
     */
    public static function getSurroundInformation($longitude,$latitude,$kilometer,$condition){
        $shopsurroundingModel = new ShopSurrounding();
        $where = [
            'loc' => [
                '$geoWithin' => [
                    '$centerSphere' => [
                        [
                            $longitude,
                            $latitude,
                        ],
                        $kilometer/6371
                    ]
                ]
            ],
        ];
        return $shopsurroundingModel::whereRaw($where)->count();
    }

}