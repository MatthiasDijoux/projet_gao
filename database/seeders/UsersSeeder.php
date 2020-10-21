<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'id' => 1,
                'nom'=>'admin',
                'mail' => 'admin@admin.com',
                'password' => bcrypt('admin'),
            ],
        ];

        DB::table('users')->insert($array);
    }
}
