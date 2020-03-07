<?php

namespace App\Http\Controllers;

use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use Modules\Wx\Entities\WxConfig;

class WechatController extends Controller
{
    //
    public function handler(WxConfig $wxConfig){
        $config = array_merge(include base_path('config') . '/wechat.php', $wxConfig->pluck('name', 'value')->toArray());
        WeChat::config($config)->valid();
    }
}
