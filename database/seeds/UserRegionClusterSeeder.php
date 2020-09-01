<?php

use Illuminate\Database\Seeder;

class UserRegionClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'kvantorium',
            'email' => 'octtuvrn@mail.ru',
            'fullname' => 'ГБУ ДО ВО "ЦИКДиМ "Кванториум"',
            'district' => 100,
            'status' => 100,
            'password' => bcrypt('H0aQD198'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'kvantrossosh',
            'email' => 'kvantrossosh@yandex.ru',
            'fullname' => 'Центр инженерных компетенций детей и молодежи "Кванториум" в г. Россошь',
            'district' => 100,
            'status' => 100,
            'password' => bcrypt('vY8jJRRT'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'vatk',
            'email' => 'vatk2001@mail.ru',
            'fullname' => 'Воронежский авиационный техникум имени В.П.Чкалова',
            'district' => 100,
            'status' => 100,
            'password' => bcrypt('J6iv6H7H'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
