<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
        	[
        		'id' => 1,
        		'name' => 'Plentong Natural',
        		'slug' => 'plentong-natural',
        		'price' => 1500,
        		'category_id' => 1,
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 2,
        		'name' => 'Plentong Glasir',
        		'slug' => 'plentong-glasir',
        		'price' => 2500,
        		'category_id' => 1,
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 3,
        		'name' => 'Morando Natural',
        		'slug' => 'morando-natural',
        		'price' => 2500,
        		'category_id' => 2,
        		'created_at' => now(),
        		'updated_at' => now()
        	],

        	[
        		'id' => 4,
        		'name' => 'Morando Glasir',
        		'slug' => 'morando-glasir',
        		'price' => 3500,
        		'category_id' => 2,
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 5,
        		'name' => 'Nok Natural',
        		'slug' => 'nok-natural',
        		'price' => 2000,
        		'category_id' => 3,
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 6,
        		'name' => 'Nok Glasir',
        		'slug' => 'nok-glasir',
        		'price' => 3000,
        		'category_id' => 3,
        		'created_at' => now(),
        		'updated_at' => now()
        	]
        ]);
    }
}
