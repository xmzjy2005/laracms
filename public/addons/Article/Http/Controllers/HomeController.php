<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\FileViewFinder;
use Modules\Article\Entities\Content;
use View;
use App;
use Modules\Article\Entities\Category;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct()
    {
        $template = \HDModule::config('article.config.template');
        //这里是其中一种更改模板视图的方法
        //$paths = [
        //    public_path('templates/'.$template),
        //
        //];
        //$rs  = new FileViewFinder(App::make('files'),$paths);
        //View::setFinder($rs);
        //用另外一种方法
        $finder = app('view')->getFinder();
        $finder->prependLocation('templates/'.$template);
    }
    
    public function index()
    {
        //echo 111;
        //dd(111);
        return view('index');
    }
    
    public function lists(Category $category)
    {
        $data = Content::where('category_id',$category['id'])->paginate(1);
        return view('lists', compact('data','category'));
    }
    
    public function content(Content $content)
    {
        return view('content', compact('content'));
    }
    
}
