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
             'tahun' => '2018'
           ],
           [
             'kelas' => '10 mipa 2',
             'tahun' => '2018'
           ],
           [
             'kelas' => '11 mipa 1',
             'tahun' => '2018'
           ],
           [
             'kelas' => '11 mipa 2',
             'tahun' => '2018'
           ],
           [
             'kelas' => '12 mipa 1',
             'tahun' => '2018'
           ],
           [
             'kelas' => '12 mipa 2',
             'tahun' => '2018'
           ]
       ]);
    }
}
