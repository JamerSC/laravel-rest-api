<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
            ->count(25) // 25 customer
            ->hasInvoices(10) // 10 invoces each
            ->create();

        Customer::factory()
            ->count(100) 
            ->hasInvoices(5)
            ->create();
        
        Customer::factory()
            ->count(100) 
            ->hasInvoices(3)
            ->create();

        Customer::factory()
            ->count(5) 
            ->create();
    }
}
