<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
{
    //验证规则
    public function rules()
    {
        return [
            'title' => 'required',
            'url' => 'required',
            'pic' => 'required',
            'click' => 'required',
            'enable' => 'required',
            
        ];
    }

    //错误信息处理
    public function messages()
    {
        return [
            'title.required' => '标题不为空',
            'url.required' => '链接不为空',
            'pic.required' => '图片不为空',
            'click.required' => '点击数不为空',
            'enable.required' => '状态不为空',
            
        ];
    }

    //权限验证
    public function authorize()
    {
        return true;
    }
}
