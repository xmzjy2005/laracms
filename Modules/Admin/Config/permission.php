<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/2 上午12:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
/**
 * 权限配置
 * 为了避免其他模块有同名的权限，权限标识要以 '控制器@方法' 开始
 */
return [
    [
        'group' => '角色管理',
        'permissions' => [
            ['title' => '角色列表', 'name' =>"Modules\Admin\Http\Controllers\RoleController@index", 'guard' => 'admin'],
            ['title' => '修改列表', 'name' => "Modules\Admin\Http\Controllers\RoleController@edit", 'guard' => 'admin'],
            ['title' => '删除角色', 'name' => "Modules\Admin\Http\Controllers\RoleController@destroy", 'guard' => 'admin'],
            ['title' => '添加角色', 'name' => "Modules\Admin\Http\Controllers\RoleController@create", 'guard' => 'admin'],
            ['title' => '修改角色权限', 'name' => "Modules\Admin\Http\Controllers\RoleController@permission", 'guard' => 'admin'],
        ],
    ],
    
];
