<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\Admin::class,6)->create();
        $user = $users[0];
        $user->name = 'zjy';
        $user->nickname = 'zjy';
        $user->save();
        \Spatie\Permission\Models\Role::create([
            'title'=>'站长',
            'name' => 'webmaster',
            'guard_name'=>'admin',
            
        ]);
        $user->assignRole('webmaster');
    }
}
