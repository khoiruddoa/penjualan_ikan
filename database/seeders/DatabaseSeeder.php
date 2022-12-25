<?php

namespace Database\Seeders;

use App\Models\Supplier;
use App\Models\User;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Database\Seeder;
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
        User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::create([
            'name' => 'IKAN BANDENG'


        ]);
        Category::create([
            'name' => 'IKAN LELE'


        ]);
        Category::create([
            'name' => 'IKAN TONGKOL'
        ]);


        Category::create([
            'name' => 'IKAN TERI'
        ]);
        Customer::factory(30)->create();
        Supplier::factory(5)->create();
    }
}
