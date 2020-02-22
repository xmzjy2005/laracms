<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //这里直接返回，前台让用户自己注册
        return ;
        $users = factory(\App\User::class,30)->create();
        $user = $users[0];
        $user->name = 'zjy';
        $user->email = '382338766@qq.com';
        $user->mail_token = str_random(10);
        $user->save();
    }
}
