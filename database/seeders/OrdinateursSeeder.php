<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdinateursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array = [
            [
                'id' => 1,
                'nom' => 'ordinateur 1',
            ],
            [
                'id' => 2,
                'nom' => 'ordinateur 2',
            ],
            [
                'id' => 3,
                'nom' => 'ordinateur 3',
            ]
        ];

        DB::table('ordinateurs')->insert($array);
    }
}
