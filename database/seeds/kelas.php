<?php

use Illuminate\Database\Seeder;

class kelas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Kelas::insert([
           [
             'kelas' => '10 mipa 1',
             'tahun' => '2019'
           ]
       ]);
    }
}
