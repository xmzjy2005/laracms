<?php

Route::group(['middleware' => ['web','auth:admin'], 'prefix' => 'article', 'namespace' => 'Modules\Article\Http\Controllers'], function()
{
    
    Route::resource('category', 'CategoryController');
    Route::resource('content', 'ContentController',['except'=>['show']]);
    Route::get('/', 'ContentController@index');
    Route::get('template', 'TemplateController@index');
    Route::get('template/set/{name}', 'TemplateController@setDefaultTemplate');
    Route::resource('slide', 'SlideController');
   
});

Route::group(['middleware' => ['web'], 'prefix' => 'article', 'namespace' => 'Modules\Article\Http\Controllers'], function()
{
    
    Route::get('lists/{category}.html', 'HomeController@lists');
    Route::get('content/{content}.html', 'HomeController@content');

});
//评论需要前台账号登录验证，守卫者为web
Route::group(['middleware' => ['web','auth:web'], 'prefix' => 'article', 'namespace' => 'Modules\Article\Http\Controllers'], function()
{
    Route::resource('comment', 'CommentController');
});
//content-route
//Route::group(['middleware' => ['web'],'prefix'=>'article','namespace'=>"Modules\Article\Http\\Controllers"],
//function () {
//    Route::resource('content', 'ContentController');
//});
 
//
//
////comment-route
//Route::group(['middleware' => ['web'],'prefix'=>'article','namespace'=>"Modules\Article\Http\\Controllers"],
//function () {
//    Route::resource('comment', 'CommentController');
//});