<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class Seeder_table_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_users')->insert([
            'name'=>'hieu',
            'age'=>'21',
            'email'=>'trunghieuit061099@gmail.com'
        ]);
    }
}
