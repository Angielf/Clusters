<?php

use Illuminate\Database\Seeder;

class Garden2Seeder extends Seeder
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
                "loginOrg" => "prs29_031",
                "nameOrg" => "МКДОУ Началовский детский сад",
                "passOrg" => "rmce2ycsp",
                "district" => 29,
            ),
            array(
                "loginOrg" => "prs31_010",
                "nameOrg" => "МКДОУ Тишанский детский сад (структурное подразделение)",
                "passOrg" => "36bzm9z3g",
                "district" => 31,
            ),
            array(
                "loginOrg" => "prs32_001",
                "nameOrg" => "МКОУ Русановская СОШ (дошкольная группа)",
                "passOrg" => "f8yd77v5s",
                "district" => 32,
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
