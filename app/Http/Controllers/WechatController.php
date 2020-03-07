<?php

namespace App\Http\Controllers;

use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use Modules\Wx\Entities\WxConfig;

class WechatController extends Controller
{
    //ssddddd
    public function handler(WxConfig $wxConfig){
        $config = array_merge(include base_path('config') . '/wechat.php', $wxConfig->pluck('value', 'name')->toArray());
        //dd($config);
        //$rs = (new WeChat)->config($config);
        $wechat = new WeChat();
        $wechat->config($config);
        $rs = $wechat->valid();
        dd($rs);
    }
}
