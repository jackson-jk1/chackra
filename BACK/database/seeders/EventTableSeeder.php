<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('events')->insert([
            'title' => 'caraio',
            'start' => '2020-11-29 21:30:00',
            'end' => '2020-12-10 21:30:00',
            'color' => '#c40233',
            'rendering' =>'background'
        ]);
    }
}
