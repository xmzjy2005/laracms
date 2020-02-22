<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Modules\Admin\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles = Role::where('name','<>',config('hd_module.webmaster'))->get();
        return view('admin::role.index',compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        Role::create(['name'=>$request->name,'title'=>$request->title]);
        session()->flash('success', '角色创建成功');
        return back();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('admin::show');
    }
    
    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(RoleRequest $request,Role $role)
    {
        $role->update(['name'=>$request->name,'title'=>$request->title]);
        session()->flash('success','角色编辑成功');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('/admin/role')->with('success', '删除成功');
    }
    public function permission(Role $role){
        //$roles = $role->toArray();
        $modules = \HDModule::getPermissionByGuard('admin');
        return view('admin::role.permission',compact('role','modules'));
    }
    
    public function permissionStore(Request $request,Role $role)
    {
        $role->syncPermissions($request->name);
        session()->flash('success', '权限设置成功');
        return back();
    }
}
