<?php

use Illuminate\Database\Seeder;

class AddRegionClustersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'vcpm',
            'email' => '36@vcpm.ru',
            'fullname' => 'ВЦПМ',
            'district' => 100,
            'status' => 100,
            'password' => bcrypt('rkXRp9JC'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'vhpu',
            'email' => 'vgpu@yandex.ru',
            'fullname' => 'ВГПУ',
            'district' => 100,
            'status' => 100,
            'password' => bcrypt('HVM3dcUi'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'col_009',
            'email' => 'col_009@vcpm.ru',
            'fullname' => 'ГБПОУ ВО «Губернский педагогический колледж»',
            'district' => 45,
            'status' => 0,
            'password' => bcrypt('z225aj2a2'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'bg-col',
            'email' => 'bg-col@yandex.ru',
            'fullname' => 'Борисоглебский колледж',
            'district' => 4,
            'status' => 0,
            'password' => bcrypt('S3tvvLLo'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
