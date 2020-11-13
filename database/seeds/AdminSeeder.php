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
        $user_info = array(
            array(
                "loginOrg" => "admin2",
                "nameOrg" => "admin2",
                "passOrg" => "admin2_2",
                "district" => NULL,
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
