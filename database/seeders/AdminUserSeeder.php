<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create a sample vendor user
        $vendorUser = User::create([
            'name' => 'Sample Vendor',
            'email' => 'vendor@example.com',
            'password' => Hash::make('vendor123'),
            'role' => 'vendor',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create vendor profile for the vendor user
        $vendorUser->vendor()->create([
            'shop_name' => 'Sample Shop',
            'shop_url' => 'sample-shop',
            'description' => 'This is a sample vendor shop for demonstration purposes.',
            'phone' => '+1234567890',
            'address' => '123 Main Street',
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
            'postal_code' => '10001',
            'commission_rate' => 10.00,
            'status' => 'approved',
            'is_active' => true,
        ]);

        // Create a sample customer user
        User::create([
            'name' => 'Sample Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('customer123'),
            'role' => 'customer',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin, vendor, and customer users created successfully!');
        $this->command->info('Admin: admin@example.com / admin123');
        $this->command->info('Vendor: vendor@example.com / vendor123');
        $this->command->info('Customer: customer@example.com / customer123');
    }
}
