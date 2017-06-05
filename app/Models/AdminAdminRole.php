<?php

namespace App\Models;

/*use Session;
use Illuminate\Database\Eloquent\Model;*/
use App\Jobs\CityName;
use Session;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

/**
 * Class BinliAdminRoleUser
 */
class AdminAdminRole extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'admin_admin_role';

    public $timestamps = false;

    protected $fillable = [
        'admin_role_id',
        'admin_id'
    ];

    protected $guarded = [];


    public static function getByAdminId($adminId)
    {
        return self::where('admin_id', $adminId)->get();
    }

    public function roles()
    {
        return $this->belongsTo(AdminRole::class, "admin_role_id", "id");
    }

    public static function getRolesNames($adminId)
    {
        $data = [];

        if (Session::exists('ADMIN_ROLE_DATA')) {
            $data = Session::get('ADMIN_ROLE_DATA');
        } else {
            $adminRole = AdminAdminRole::with('roles')->where(['admin_id' => $adminId])->get();
            foreach ($adminRole as $item) {
                $data[] = $item->roles->name;
            }
            Session::put('ADMIN_ROLE_DATA', $data);
        }

        return $data;
    }
    public function permission_role()
    {
        return $this->hasMany(AdminPermissionRole::class, "admin_role_id", "admin_role_id");
    }
    public function permission(){
        return $this->belongsTo(Permission::class, "admin_permission_id", "id");
    }

    public static function getPermissionData($id){
        return self::with('permission_role')->where('admin_id',$id)->get()->toArray();
    }

}