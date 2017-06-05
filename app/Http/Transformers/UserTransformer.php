<?php

namespace App\Http\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    protected $availableIncludes = [];
    protected $defaultIncludes = [];

    public function transform(User $item)
    {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'sex' => $item->sex,
            'telphone' => $item->telphone,
            'car_company'=>isset($item->car->car_company) ? $item->car->car_company : '',
            'license_plate'=>isset($item->car->license_plate) ? $item->car->license_plate : '',
            'birthday' => $item->birthday,
            'created_at'=>(string)$item->created_at,
            'first_time'=>isset($item->car->first_time) ? $item->car->first_time : '',
            'integral'=>$item->integral,
        ];
    }

}