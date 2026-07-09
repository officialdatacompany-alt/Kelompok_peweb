<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockMutation;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Roles via Spatie
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $staffRole = Role::create(['name' => 'Staff Gudang']);
        $supplierRole = Role::create(['name' => 'Supplier']);

        // 2. Create Categories
        $electronics = Category::create([
            'name' => 'Elektronik', 
            'description' => 'Gawai, komputer, komponen elektronik, dan perkabelan.'
        ]);
        $office = Category::create([
            'name' => 'ATK & Kantor', 
            'description' => 'Alat tulis kantor, kertas printer, dan perlengkapan administrasi.'
        ]);
        $furniture = Category::create([
            'name' => 'Mebel & Furnitur', 
            'description' => 'Meja, kursi, lemari besi, rak penyimpanan, dan perlengkapan gudang.'
        ]);

        // 3. Create Suppliers
        $sup1 = Supplier::create([
            'name' => 'PT. Global Technology Indonesia',
            'contact_name' => 'Budi Santoso',
            'phone' => '081234567890',
            'address' => 'Gedung Cyber Cyber Lantai 4, Jl. HR Rasuna Said, Jakarta Selatan'
        ]);
        $sup2 = Supplier::create([
            'name' => 'CV. Jaya Mandiri ATK',
            'contact_name' => 'Dewi Lestari',
            'phone' => '085678901234',
            'address' => 'Kawasan Industri Leuwi Gajah Blok C5, Cimahi, Jawa Barat'
        ]);

        // 4. Create Users (Super Admin, Staff, Supplier)
        $adminUser = User::create([
            'name' => 'Joni Owner Gudang',
            'email' => 'admin@inventory.com',
            'password' => Hash::make('password'),
            'role_id' => $superAdminRole->id,
        ]);
        $adminUser->assignRole($superAdminRole);

        $staffUser = User::create([
            'name' => 'Agus Gudang',
            'email' => 'staff@inventory.com',
            'password' => Hash::make('password'),
            'role_id' => $staffRole->id,
        ]);
        $staffUser->assignRole($staffRole);

        $supplierUser = User::create([
            'name' => 'Supplier Global Tech',
            'email' => 'supplier@inventory.com',
            'password' => Hash::make('password'),
            'role_id' => $supplierRole->id,
            'supplier_id' => $sup1->id, // Linked to PT. Global Technology Indonesia
        ]);
        $supplierUser->assignRole($supplierRole);

        // 5. Create Products
        $prod1 = Product::create([
            'category_id' => $electronics->id,
            'supplier_id' => $sup1->id,
            'sku' => 'ELK-LAP-001',
            'name' => 'Laptop Asus Vivobook 14',
            'stock' => 15,
            'minimum_stock' => 5,
            'price' => 8500000.00
        ]);

        $prod2 = Product::create([
            'category_id' => $electronics->id,
            'supplier_id' => $sup1->id,
            'sku' => 'ELK-MOU-002',
            'name' => 'Wireless Mouse Logitech B170',
            'stock' => 4, // Below minimum_stock (Low stock alert)
            'minimum_stock' => 10,
            'price' => 120000.00
        ]);

        $prod3 = Product::create([
            'category_id' => $office->id,
            'supplier_id' => $sup2->id,
            'sku' => 'ATK-PAP-001',
            'name' => 'Kertas HVS Sinar Dunia A4 80gr',
            'stock' => 50,
            'minimum_stock' => 20,
            'price' => 45000.00
        ]);

        $prod4 = Product::create([
            'category_id' => $furniture->id,
            'supplier_id' => $sup2->id,
            'sku' => 'FNT-CHR-001',
            'name' => 'Kursi Kerja Ergonomis',
            'stock' => 3, // Below minimum_stock (Low stock alert)
            'minimum_stock' => 5,
            'price' => 850000.00
        ]);

        // 6. Create Historical Stock Mutations
        StockMutation::create([
            'product_id' => $prod1->id,
            'user_id' => $staffUser->id,
            'type' => 'in',
            'quantity' => 15,
            'notes' => 'Stok awal dari supplier saat peresmian sistem.',
            'created_at' => now()->subDays(6),
        ]);

        StockMutation::create([
            'product_id' => $prod2->id,
            'user_id' => $staffUser->id,
            'type' => 'in',
            'quantity' => 10,
            'notes' => 'Barang masuk awal dari supplier.',
            'created_at' => now()->subDays(5),
        ]);

        StockMutation::create([
            'product_id' => $prod2->id,
            'user_id' => $staffUser->id,
            'type' => 'out',
            'quantity' => 6,
            'notes' => 'Pengeluaran untuk workstation karyawan baru divisi IT.',
            'created_at' => now()->subDays(2),
        ]);

        StockMutation::create([
            'product_id' => $prod3->id,
            'user_id' => $staffUser->id,
            'type' => 'in',
            'quantity' => 50,
            'notes' => 'Penerimaan stok bulanan ATK.',
            'created_at' => now()->subDays(3),
        ]);

        StockMutation::create([
            'product_id' => $prod4->id,
            'user_id' => $staffUser->id,
            'type' => 'in',
            'quantity' => 3,
            'notes' => 'Stok awal kursi manager.',
            'created_at' => now()->subDays(4),
        ]);
    }
}
