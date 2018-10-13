<?php

use Illuminate\Database\Seeder;

class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('counties')->get()->count() == 0){

            DB::table('counties')->insert([

                [
                    'county' => 'Bringo',
                    'lat' => '0.855499',
                    'long' => '36.089341',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Bomet',
                    'lat' => '-0.801501',
                    'long' => '35.302723',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Bungoma',
                    'lat' => '0.569525',
                    'long' => '34.558377',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Busia',
                    'lat' => '0.434651',
                    'long' => '34.242160',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Elgeyo Marakwet',
                    'lat' => '0.672480',
                    'long' => '35.507198',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Embu',
                    'lat' => '-0.544215',
                    'long' => '37.451617',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Garissa',
                    'lat' => '-0.453229',
                    'long' => '39.646099',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Homa Bay',
                    'lat' => '-0.622065',
                    'long' => '34.331036',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Isiolo',
                    'lat' => '0.709649',
                    'long' => '38.506590',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Kajiado',
                    'lat' => '-2.098075',
                    'long' => '36.781950',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Kakamega',
                    'lat' => '0.282731',
                    'long' => '34.751863',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Kericho',
                    'lat' => '-0.368897',
                    'long' => '35.286286',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Kiambu',
                    'lat' => '-1.173088',
                    'long' => '36.834130',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Kilifi',
                    'lat' => '-3.510651',
                    'long' => '39.909327',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Kirinyaga',
                    'lat' => '-0.527924',
                    'long' => '37.331321',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Kisii',
                    'lat' => '-0.677334',
                    'long' => '34.779603',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Kisumu',
                    'lat' => '-0.091702',
                    'long' => '34.767957',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Kitui',
                    'lat' => '-1.683282',
                    'long' => '38.316573',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Kwale',
                    'lat' => '-4.166667',
                    'long' => '39.450000',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Laikipia',
                    'lat' => '0.377139',
                    'long' => '36.788443',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Lamu',
                    'lat' => '-2.235506',
                    'long' => '40.472000',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Machakos',
                    'lat' => '-1.517684',
                    'long' => '37.263415',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Makueni',
                    'lat' => '-2.154501',
                    'long' => '37.773669',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Mandera',
                    'lat' => '3.573799',
                    'long' => '40.958688',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Marsabit',
                    'lat' => '2.333333',
                    'long' => '37.983333',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Meru',
                    'lat' => '0.047735',
                    'long' => '37.647904',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Migori',
                    'lat' => '-1.066667',
                    'long' => '34.466667',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Mombasa',
                    'lat' => '-4.069249',
                    'long' => '39.677143',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Muranga',
                    'lat' => '-0.783928',
                    'long' => '37.040034',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Nairobi',
                    'lat' => '-1.292066',
                    'long' => '36.821946',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Nakuru',
                    'lat' => '-0.286248',
                    'long' => '36.061308',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Nandi',
                    'lat' => '0.183587',
                    'long' => '35.126878',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Narok',
                    'lat' => '-1.360546',
                    'long' => '35.740688',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Nyamira',
                    'lat' => '-0.648269',
                    'long' => '34.994751',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Nyandarua',
                    'lat' => '-0.180386',
                    'long' => '36.522964',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Nyeri',
                    'lat' => '-0.440650',
                    'long' => '36.963158',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Samburu',
                    'lat' => '1.215451',
                    'long' => '36.954107',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Siaya',
                    'lat' => '-0.061733',
                    'long' => '34.242160',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Taita Taveta',
                    'lat' => '-3.316069',
                    'long' => '38.484992',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Tana River',
                    'lat' => '-1.586789',
                    'long' => '39.442418',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Tharaka Nithi',
                    'lat' => '-0.300000',
                    'long' => '38.016667',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Trans Nzoia',
                    'lat' => '1.056667',
                    'long' => '34.950663',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Turkana',
                    'lat' => '3.039887',
                    'long' => '35.620705',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Uasin Gishu',
                    'lat' => '0.552764',
                    'long' => '35.302723',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Vihiga',
                    'lat' => '0.092104',
                    'long' => '34.729877',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'Wajir',
                    'lat' => '1.750139',
                    'long' => '40.057743',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'county' => 'West Pokot',
                    'lat' => '1.592444',
                    'long' => '35.285362',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
