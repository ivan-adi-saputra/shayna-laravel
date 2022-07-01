<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Ivan Adi Saputra', 
            'username' => 'ivanadisaputra',
            'email' => 'ivanadisaputra@gmail.com', 
            'password' => bcrypt('password')
        ]);
        Product::factory(10)->create();
        Transaction::factory(10)->create();
    }
}
