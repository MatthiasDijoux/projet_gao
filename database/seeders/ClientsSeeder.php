<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsSeeder extends Seeder
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
                'nom' => 'Henry',
                'prenom' => 'Charles',
            ],
            [
                'id' => 2,
                'nom' => 'Heyrault',
                'prenom' => 'Pierrot',
            ],
            [
                'id' => 3,
                'nom' => 'Boyet',
                'prenom' => 'Paul',
            ]
        ];

        DB::table('clients')->insert($array);
    }
}
