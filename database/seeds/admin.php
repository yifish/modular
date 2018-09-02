<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\MyCommon\Cipher;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cipher = new Cipher('123456');
        DB::table('admin')->insert([
            'id' => 1,
            'name' => 'admin',
            'loginName' => 'admin',
            'password' => $cipher->encryption(),
            'random' => $cipher->getString(),
            'created_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('role')->insert([
            'id' => 1,
            'name' => '超级管理员',
            'competence' => '*',
            'created_at' => date('Y-m-d H:i:s', time())
        ]);
    }
}
