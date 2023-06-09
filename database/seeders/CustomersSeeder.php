<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = json_decode(File::get("customers.json"));
        foreach ($products as $product) {
            Customers::create([
                'name' => $product->name,
                'since' => $product->since,
                'revenue' => $product->revenue,
            ]);
        }
    }
}
