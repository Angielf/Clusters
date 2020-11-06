<?php

use Illuminate\Database\Seeder;

class ProfSeeder extends Seeder
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
                "loginOrg" => "col_015",
                "nameOrg" => "Государственное бюджетное профессиональное образовательное учреждение Воронежской области \"Бобровский аграрно-индустриальный колледж имени М. Ф. Тимашовой\"",
                "passOrg" => "rjk7zvsh7",
                "district" => 2,
            ),
            array(
                "loginOrg" => "col_017",
                "nameOrg" => "Государственное бюджетное профессиональное образовательное учреждение Воронежской области \"Хреновская школа наездников\"",
                "passOrg" => "mg576agmz",
                "district" => 2,
            ),
            array(
                "loginOrg" => "col_032",
                "nameOrg" => "Государственное бюджетное профессиональное образовательное учреждение Воронежской области \"Хреновской лесной колледж имени Г.Ф. Морозова\"",
                "passOrg" => "yft98ym3z",
                "district" => 2,
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
