<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Solidity SCs', 'Rust programs', 'PyTeal SCs', 'DApp Security', 'OWASP', 'DEFI issues'] as $category) {
            DB::table('categories')->updateOrInsert(
                [
                    'name' => $category,
                ],
                [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
