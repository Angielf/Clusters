<?php

use Illuminate\Database\Seeder;

class OtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_info = array(
            array(
                "loginOrg" => "sch18_028",
                "nameOrg" => "МБУ ДО «Центр развития физической культуры и спорта»",
                "passOrg" => "wk8bzwnm",
                "district" => 18,
            ),
            array(
                "loginOrg" => "d01",
                "nameOrg" => "МКУ ДО «Аннинская детско-юношенская спортивная школа»",
                "passOrg" => "Us2iek",
                "district" => 1,
            ),


        );

        foreach ($user_info as $user) {
            DB::table('users')->insert([
                'name' => $user['loginOrg'],
                'email' => $user['loginOrg'] . '@mail.ru',
                'fullname' => $user['nameOrg'],
                'district' => $user['district'],
                'password' => bcrypt($user['passOrg']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
