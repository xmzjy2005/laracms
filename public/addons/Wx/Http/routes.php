<?php

Route::group(['middleware' => ['web','auth:admin'], 'prefix' => 'wx', 'namespace' => 'Modules\Wx\Http\Controllers'], function()
{
    Route::get('/', 'WxController@index');
    Route::resource('wx_config', 'WxConfigController');
    Route::resource('wxmenu', 'WxmenuController');
});

 
//wx_config-route
//Route::group(['middleware' => ['web'],'prefix'=>'wx','namespace'=>"Modules\Wx\Http\\Controllers"],
//function () {
//    Route::resource('wx_config', 'WxConfigController');
//});
 
//wxmenu-route
//Route::group(['middleware' => ['web'],'prefix'=>'wx','namespace'=>"Modules\Wx\Http\\Controllers"],
//function () {
//    Route::resource('wxmenu', 'WxmenuController');
//});