<?php

namespace Database\Seeders;

use App\Models\MarketplaceProduct;
use Illuminate\Database\Seeder;

class MarketplaceSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'product_name' => 'MacBook Pro M3 Max 16-inch 36GB 1TB',
                'price' => 42999000.00,
                'category' => 'Elektronik',
                'marketplace_provider' => 'tokopedia',
                'product_url' => 'https://tokopedia.com',
                'is_active' => true,
            ],
            [
                'product_name' => 'MacBook Air M2 8GB 256GB Midnight',
                'price' => 16000000.00,
                'category' => 'Elektronik',
                'marketplace_provider' => 'tokopedia',
                'product_url' => 'https://tokopedia.com',
                'is_active' => true,
            ],
            [
                'product_name' => 'Honda Vario 160 ABS Matte Black 2026',
                'price' => 27000000.00,
                'category' => 'Kendaraan',
                'marketplace_provider' => 'shopee',
                'product_url' => 'https://shopee.co.id',
                'is_active' => true,
            ],
            [
                'product_name' => 'Canon EOS R50 Body Only Black',
                'price' => 10000000.00,
                'category' => 'Elektronik',
                'marketplace_provider' => 'lazada',
                'product_url' => 'https://lazada.co.id',
                'is_active' => true,
            ],
            [
                'product_name' => 'iPhone 15 Pro Max 256GB Natural Titanium',
                'price' => 21000000.00,
                'category' => 'Elektronik',
                'marketplace_provider' => 'tokopedia',
                'product_url' => 'https://tokopedia.com',
                'is_active' => true,
            ],
        ];

        foreach ($products as $p) {
            MarketplaceProduct::updateOrCreate(['product_name' => $p['product_name']], $p);
        }
    }
}
