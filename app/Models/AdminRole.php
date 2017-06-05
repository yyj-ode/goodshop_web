<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

/**
 * Class BinliAdminRole
 */
class AdminRole extends EntrustRole
{
    protected $connection = 'mysql';

    protected $table = 'admin_admin_role';

    public $timestamps = true;

    protected $fillable = [
        'admin_id',
        'admin_role_id',
    ];

    protected $guarded = [];


    public function admins ()
    {
        // 多对多的关系（一个角色赋予了多个用户）
        return $this->belongsToMany(Admin::class);
    }

    /**
     * update
     * @param array $PermissionsId
     */
    public function givePermissionsTo(array $PermissionsId){
        $this->detachPermissions($this->perms);
        $this->attachPermissionToId($PermissionsId);
    }

    /**
     * Attach multiple $PermissionsId to a user
     *
     *
     */
    public function attachPermissionToId($PermissionsId)
    {
        foreach ($PermissionsId as $pid) {
            $this->attachPermission($pid);
        }
    }
}