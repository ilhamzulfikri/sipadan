<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 10000; $i++){
        DB::table('notadinas')->insert([
        	'no_notadinas' => $faker->numerify('### /ND/TREN /2019'),
        	'tgl_notadinas' => $faker->date($format = 'Y-m-d', $max = 'now'),
        	'pekerjaan' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        	'sumber_dana' => '03/R/AO-AGA/UIW.ACEH/2019-SBS',
        	'nilai_rab' => $faker->numberBetween($min = 50000000, $max = 500000000),
        	'no_prk' => 'PRK.6115.19.11.1.300.020',
        	'lokasi' => $faker->streetAddress,
        	'upload_notadinas' => $faker->url,
        	'upload_rab' => $faker->url,
        	'upload_justifikasi' => $faker->url,
        	'user' => 'fadli',
        	'bidang' => 'tren',
        	'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        	'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        ]);
    	}
    }
}
