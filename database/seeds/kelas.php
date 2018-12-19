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
             'kelas' => '10 Boarding',
             'tahun' => '2019'
           ],
           [
             'kelas' => '10 non-Boarding',
             'tahun' => '2019'
           ],
           [
             'kelas' => '11 Boarding',
             'tahun' => '2018'
           ],
           [
             'kelas' => '11 non-Boarding',
             'tahun' => '2018'
           ],
           [
             'kelas' => '12 Boarding',
             'tahun' => '2017'
           ],
           [
             'kelas' => '12 non-Boarding',
             'tahun' => '2017'
           ]
       ]);
    }
}
