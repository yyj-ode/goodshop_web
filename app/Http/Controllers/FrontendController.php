<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Area;
use App\Models\Subscription;
use Session;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */

    protected function guard()
    {
        return Auth::guard('user');
    }
    public function check_user()
    {
        $result = Session::get('USER_DATA');
        if (!empty($result)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    /**
     * 订阅
     */
    public function subscribe(){
        $subscriptionModel = new Subscription();
        $data['price']  = $subscriptionModel::getPriceData();
        $data['totalarea'] = $subscriptionModel::getTotalareaData();
        $data['format'] = $subscriptionModel::getCategoryData();
        $data['area_level'] = $subscriptionModel::getDistrictData();
        return $data;
    }
    //获得市县
    public function city_county($city,$county){
        $city = Area::where('id',$city)->first();
        $county = Area::where('id',$county)->first();
        return $city->name.'-'.$county->name;
    }
    public function get_user_id(){
        $result = Session::get('USER_DATA');
        if (!empty($result)) {
            $result = $result['id'];
        } else {
            $result = false;
        }
        return $result;
    }
}
