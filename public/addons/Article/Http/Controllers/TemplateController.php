<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Services\TemplateService;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(TemplateService $templateService)
    {
        $templates = $templateService->all();
        return view('article::templates.index',compact('templates'));
    }
    
    public function setDefaultTemplate($name)
    {
        \HDModule::saveConfig(['template' => $name], 'config');
        return back()->with('success', '设置默认模板成功');
    }
    
}
