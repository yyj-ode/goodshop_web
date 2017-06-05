<?php

namespace App\Http\Middleware;

use App\Models\AdminUser;
use App\Models\AdminPermission;
use App\Models\AdminRole;
use Closure;
use Entrust;
use Auth,Cache;
class GetMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        view()->share('comData',$this->getMenu());
        return $next($request);
    }

    /**
     * 获取左边菜单栏
     * @return array
     */
    function getMenu()
    {

//        $owner = new Role();
//        $owner->name         = 'owner';
//        $owner->display_name = 'Project Owner'; // optional
//        $owner->description  = 'User is the owner of a given project'; // optional
//        $owner->save();
//
//        $admin = new Role();
//        $admin->name         = 'admin';
//        $admin->display_name = 'User Administrator'; // optional
//        $admin->description  = 'User is allowed to manage and edit other users'; // optional
//        $admin->save();

          $admin = AdminRole::where('id', '=', '2')->first();
//        $user = Admin::where('name', '=', 'yangcuiwang')->first();
//
//        $user->attachRole($admin); // parameter can be an Role object, array, or id
//
//        $user->roles()->attach($admin->id); // id only


//        $createPost = new Permission();
//        $createPost->name         = 'create-post';
//        $createPost->display_name = 'Create Posts'; // optional
//// Allow a user to...
//        $createPost->description  = 'create new blog posts'; // optional
//        $createPost->save();
//
//        $editUser = new Permission();
//        $editUser->name         = 'edit-user';
//        $editUser->display_name = 'Edit Users'; // optional
//// Allow a user to...
//        $editUser->description  = 'edit existing users'; // optional
//        $editUser->save();
//
//        $admin->attachPermission($createPost);
//// equivalent to $admin->perms()->sync(array($createPost->id));
//
////        $owner->attachPermissions(array($createPost, $editUser));


        $auth = Auth::guard('admin')->user();
        $user = AdminUser::whereId($auth->id)->first();
        $user->ability('admin,owner', 'create-post,edit-user', ['validate_all' => false, 'return_type' => 'boolean']);
//        dd($user->ability('admin', 'create-post,edit-user'));
//
//        dd(Auth::guard('admin')->user()->can('create-post'));
//
//        $createPost = new Permission();
//        $createPost->name         = 'create-post';
//        $createPost->display_name = 'Create Posts'; // optional
//        $createPost->description  = 'create new blog posts'; // optional
//        $createPost->save();
//        $user->attachPermission($createPost);

//        dd($auth->can('create-post'));
        $openArr = [];
        $data = [];
        $data['top']=[];
        //查找并拼接出地址的别名值
        $path_arr = explode('/', \URL::getRequest()->path());
        if (isset($path_arr[1])) {
            $urlPath = $path_arr[0] . '.' . $path_arr[1] . '.index';
        } else {
            $urlPath = $path_arr[0] . '.index';
        }
        //查找出所有的地址
        $table = Cache::store('file')->rememberForever('menus',function(){
            return AdminPermission::where('name', 'LIKE', '%index')
                ->orWhere('cid', '==', 0)
                ->get();

        });
            
        foreach ($table as $v) {

            if ($v->name == $urlPath) {
                $openArr[] = $v->id;
                $openArr[] = $v->cid;
            }

            $data[$v->cid][] = $v->toarray();

//            if ($v->cid == 0 || Auth::guard('admin')->user()->can($v->name)) {
//
//
//            }
        }

        foreach ($data[0] as $v){
            if(isset($data[$v['id']]) && is_array($data[$v['id']]) && count($data[$v['id']]) > 0){
                $data['top'][]=$v;
            }
        }
        unset($data[0]);
        //ation open 可以在函数中计算给他
        $data['openarr'] = array_unique($openArr);
        return $data;

    }
}
