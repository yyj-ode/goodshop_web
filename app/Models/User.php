<?php

namespace App\Models;

use App\Notifications\UserResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Scopes\AgeScope;
use HaoLi\LaravelAmount\Traits\AmountTrait;
use Log;

/**
 * Class BinliUser
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use AmountTrait;
    protected $connection = 'mysql';

    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'nickname',
        'email',
        'sex',
        'age',
        'password',
        'province',
        'city',
        'avatar',
        'mobile',
        'last_ip',
        'login_times',
        'referee',
        'check',
        'status',
    ];

    protected $guarded = [];

    public function roles()
    {
        // 多对多的关系（一个用户有多个角色）
        return $this->belongsToMany(AdminRole::class);
    }

    public static function getByEmail($email)
    {
        return self::where(['email' => $email])->first();
    }

    public static function getDataById($id)
    {
        return self::where('id', $id)->first();
    }

    public static function getByParentId($parent_id)
    {
        return self::where('parent_id', $parent_id)->get();
    }


    public function category()
    {
        return $this->belongsTo(Category::class, "parent_id", "id");
    }


    public static function allListData($start, $length, $columns, $order, $key)
    {
        if ($key) {
            return self::select("*")->where('account', 'like', '%' . $key . '%')->offset($start)->limit($length)->orderBy($columns, $order)->get();
        } else {
            return self::offset($start)->limit($length)->orderBy($columns, $order)->get();
        }

    }

    public static function getAll($type = "CN", $parent_id = 0)
    {
        return self::select("*")->where(['show' => 1, 'type' => $type, 'parent_id' => $parent_id])->orderBy('id', 'asc')->get();
    }

    public static function countNumber()
    {
        return self::count();
    }

    public static function getEmail($email)
    {
        return self::where('email', $email)->first();
    }

    public static function getId($id)
    {
        return self::where('id', $id)->first();
    }

    /**
     * 获取单条信息
     * @param $data = ['id'=>11];
     * @return array
     */
    public static function getOneData($data)
    {
        $result = [];
        try {
            $param = [];
            foreach ($data as $key => $value) {
                $param[$key] = $value;
            }
            $result = self::where($param)->first();
            return $result;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return $result;
    }

    /**
     * 添加数据
     * @param $data
     * @return bool
     */
    public static function addData($data)
    {
        try {
            $model = new self();
            foreach ($data as $key => $value) {
                $model->{$key} = $value;
            }
            Log::info('addData:' . json_encode($data));
            return $model->save();
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * 通过ID更新数据
     * @param $id
     * @param $data
     * @return bool
     */
    public static function updateData($id, $data)
    {
        try {
            $model = self::where('id', $id)->first();
            foreach ($data as $key => $value) {
                $model->{$key} = $value;
            }
            Log::info('addData:' . json_encode($data));
            return $model->save();
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * 判断是否存在（如：用户手机号码）
     * @param $data
     * @return bool
     */
    public static function checkData($data)
    {
        try {
            $param = [];
            foreach ($data as $key => $value) {
                $param[$key] = $value;
            }
            $model = self::where($param)->first();
            Log::info('addData:' . json_encode($param));
            return $model ? true : false;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }
}