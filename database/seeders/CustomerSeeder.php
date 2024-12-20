<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customers = [
            [
                'name' => 'Daffa Julistio',
                'email' => 'daffa@admin.com',
                'phone' => '1234567890',
                'address' => 'Pasaman',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '0987654321',
                'address' => '456 Elm St, Othertown, USA',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
