<?php
namespace Modules\Wx\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Wx\Entities\Wxmenu;
use Modules\Wx\Http\Requests\WxmenuRequest;
class WxmenuController extends Controller
{
    //显示列表
    public function index()
    {
       
        $data = Wxmenu::paginate(10);
        return view('wx::wxmenu.index', compact('data'));
    }

    //创建视图
    public function create(Wxmenu $wxmenu)
    {
        return view('wx::wxmenu.create',compact('wxmenu'));
    }

    //保存数据
    public function store(WxmenuRequest $request,Wxmenu $wxmenu)
    {
        $wxmenu->fill($request->all());
        $wxmenu->save();

        return redirect('/wx/wxmenu')->with('success', '保存成功');
    }

    //显示记录
    public function show(Wxmenu $field)
    {
        return view('wx::wxmenu.show', compact('field'));
    }

    //编辑视图
    public function edit(Wxmenu $wxmenu)
    {
        return view('wx::wxmenu.edit', compact('wxmenu'));
    }

    //更新数据
    public function update(WxmenuRequest $request, Wxmenu $wxmenu)
    {
        $wxmenu->update($request->all());
        return redirect('/wx/wxmenu')->with('success','更新成功');
    }

    //删除模型
    public function destroy(Wxmenu $wxmenu)
    {
        $wxmenu->delete();
        return redirect('wx/wxmenu')->with('success','删除成功');
    }
}
