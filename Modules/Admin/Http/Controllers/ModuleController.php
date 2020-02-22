<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Module;
use Modules\Admin\Http\Requests\ModuleRequest;
use Modules\Admin\Services\ModuleService;
class ModuleController extends Controller
{
    //显示列表
    public function index(Module $module)
    {
        $data = $module->get();
        return view('admin::module.index', compact('data'));
    }

    //创建视图
    public function create(Module $module)
    {
        return view('admin::module.create',compact('module'));
    }

    //保存数据
    public function store(ModuleRequest $request,Module $module)
    {
        $module->fill($request->all());
        $module->save();

        return redirect('/admin/module')->with('success', '保存成功');
    }

    //显示记录
    public function show(Module $field)
    {
        return view('admin::module.show', compact('field'));
    }

    //编辑视图
    public function edit(Module $module)
    {
        return view('admin::module.edit', compact('module'));
    }

    //更新数据
    public function update(ModuleRequest $request, Module $module)
    {
        $module->update($request->all());
        return redirect('/admin/module')->with('success','更新成功');
    }

    //删除模型
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect('admin/module')->with('success','删除成功');
    }
    public function updateCache(ModuleService $moduleService){
        $moduleService->updateCache();
        return back()->with('success', '模块缓存更新成功');
    }
    public function setDefault(Module $module){
        $module->setDefault();
        return back()->with('success', '设置默认成功');
    }
}
