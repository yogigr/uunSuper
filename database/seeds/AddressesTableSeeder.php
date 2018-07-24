<?php

use Illuminate\Database\Seeder;
use App\Address;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::insert([
        	'user_id' => 2,
        	'phone' => '089653490941',
        	'address' => 'Blok A RT 02 RW 01 Desa Rajagaluhlor Kecamatan Rajagaluh',
        	'city' => 'Majalengka',
        	'province' => 'Jawa Barat',
        	'postal_code' => '45472',
        	'created_at' => now(),
        	'updated_at' => now()
        ]);
    }
}
