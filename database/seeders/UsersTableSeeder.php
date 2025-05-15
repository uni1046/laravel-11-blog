<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //生成56个用户数据
        User::factory()->count(56)->create();
        //将用户id为1的用户设为自己
        $user = User::find(1);
        $user->name = 'uniommmm';
        $user->email = 'uniommmm@gmail.com';
        $user->is_admin = true;
        $user->save();

    }
}
