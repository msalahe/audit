<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlockchainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Ethereum', 'BNB Chain', 'Solana', 'Algorand', 'Polygon', 'Avalanche'] as $blockchain) {
            DB::table('blockchains')->updateOrInsert(
                [
                    'name' => $blockchain,
                ],
                [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
