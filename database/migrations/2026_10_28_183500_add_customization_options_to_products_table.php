<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('products', 'customization_options')) {
            Schema::table('products', function (Blueprint $table) {
                $table->json('customization_options')->nullable()->after('note');
            });
        }

        // Inisialisasi default cerdas untuk produk minuman/kopi & hidangan pedas yang sudah ada
        $foodKeywords = [
            'roti', 'bun', 'bread', 'puff', 'pie', 'pastry', 'croissant', 'crombo', 
            'cake', 'donut', 'toast', 'waffle', 'danish', 'cookie', 'cookies', 'bagel', 
            'bolu', 'tart', 'brownies', 'muffin', 'steak', 'sandwich', 'burger', 'sub', 
            'wrap', 'stix', 'kopiko', 'platter', 'cream cheese'
        ];

        $products = DB::table('products')->get();
        foreach ($products as $product) {
            $lowerName = strtolower($product->name ?? '');
            $lowerCat = strtolower($product->category ?? '');
            $options = [];

            // Pastikan produk roti, bakery, pastry, cookie, burger, platter tidak mendapatkan varian minuman
            $isFoodOrBakery = false;
            foreach ($foodKeywords as $kw) {
                if (str_contains($lowerName, $kw)) {
                    // Pengecualian khusus jika minuman bernama Latte (misal Cinnamon Roll Latte)
                    if (str_contains($lowerName, 'latte') || (str_contains($lowerName, 'coffee') && str_contains($lowerName, 'combo'))) {
                        // Tetap dapat varian minuman
                    } else {
                        $isFoodOrBakery = true;
                        break;
                    }
                }
            }

            if (!$isFoodOrBakery) {
                $isCoffeeOrMilk = str_contains($lowerName, 'kopi') ||
                    str_contains($lowerName, 'coffee') ||
                    str_contains($lowerName, 'latte') ||
                    str_contains($lowerName, 'cappuccino') ||
                    str_contains($lowerName, 'macchiato') ||
                    str_contains($lowerName, 'mocha') ||
                    str_contains($lowerName, 'milk tea') ||
                    str_contains($lowerName, 'matcha') ||
                    str_contains($lowerName, 'chocolate drink') ||
                    str_contains($lowerName, 'hot chocolate') ||
                    str_contains($lowerName, 'iced chocolate') ||
                    (str_contains($lowerName, 'chocolate') && !str_contains($lowerCat, 'bakery') && !str_contains($lowerName, 'pie') && !str_contains($lowerName, 'puff') && !str_contains($lowerName, 'cookie')) ||
                    str_contains($lowerName, 'milo');

                $isOtherBeverage = str_contains($lowerName, 'americano') ||
                    (preg_match('/\b(tea|teh)\b/i', $lowerName) && !str_contains($lowerName, 'steak')) ||
                    (str_contains($lowerName, 'lemon') && !str_contains($lowerCat, 'bakery')) ||
                    str_contains($lowerName, 'blend') ||
                    str_contains($lowerName, 'frappuccino');

                if ($isCoffeeOrMilk) {
                    $options = ['temperature', 'size', 'milk', 'sugar', 'ice'];
                } elseif ($isOtherBeverage) {
                    $options = ['temperature', 'size', 'sugar', 'ice'];
                }
            }

            $isSpicyFood = str_contains($lowerName, 'penyet') ||
                str_contains($lowerName, 'rawon') ||
                str_contains($lowerName, 'soto') ||
                str_contains($lowerName, 'bebek') ||
                str_contains($lowerName, 'pedas') ||
                str_contains($lowerName, 'geprek') ||
                str_contains($lowerName, 'sambal') ||
                str_contains($lowerName, 'nasi goreng') ||
                str_contains($lowerName, 'mie');

            if (empty($options) && $isSpicyFood && !str_contains($lowerCat, 'minuman')) {
                $options = ['spicy'];
            }

            DB::table('products')
                ->where('id', $product->id)
                ->update(['customization_options' => !empty($options) ? json_encode($options) : null]);
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('products', 'customization_options')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('customization_options');
            });
        }
    }
};

