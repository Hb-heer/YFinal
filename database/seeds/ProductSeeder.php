<?php

use Illuminate\Database\Seeder;
use App\Products;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
                'name' => 'shampoo ',
                'description' => 'Description of shampoo ',
                'sku' => 56,
                'Active' => 1,
                'regularprice' => 98.06,
                'saleprice' => 98.00,
                'Brand' => 'Tresseme',
            ],
            [
                'name' => 'soap ',
                'description' => 'Detergent Soap',
                'sku' => 89,
                'Active' => 1,
                'regularprice' => 12.00,
                'saleprice' => 12.00,
                'Brand' => 'Nirma',
            ],
           
        ];

        foreach ($product as $product) {
            Products::create($product);
        }
    }
}

