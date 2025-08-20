<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $medicines = Medicine::all();
        $suppliers = Supplier::all();

        $inventoryData = [
            [
                'medicine_id' => $medicines->where('name', 'Paracetamol')->first()->id,
                'batch_number' => 'PCM001',
                'expiry_date' => now()->addMonths(18),
                'quantity' => 500,
                'cost_price' => 2000,
                'selling_price' => 3500,
                'supplier_id' => $suppliers->first()->id,
                'received_date' => now()->subDays(30),
            ],
            [
                'medicine_id' => $medicines->where('name', 'Amoxicillin')->first()->id,
                'batch_number' => 'AMX001',
                'expiry_date' => now()->addMonths(12),
                'quantity' => 200,
                'cost_price' => 5000,
                'selling_price' => 8500,
                'supplier_id' => $suppliers->skip(1)->first()->id,
                'received_date' => now()->subDays(15),
            ],
            [
                'medicine_id' => $medicines->where('name', 'Metformin')->first()->id,
                'batch_number' => 'MET001',
                'expiry_date' => now()->addMonths(24),
                'quantity' => 150,
                'cost_price' => 3500,
                'selling_price' => 6000,
                'supplier_id' => $suppliers->last()->id,
                'received_date' => now()->subDays(10),
            ],
            [
                'medicine_id' => $medicines->where('name', 'Vitamin C')->first()->id,
                'batch_number' => 'VTC001',
                'expiry_date' => now()->addMonths(6),
                'quantity' => 800,
                'cost_price' => 1500,
                'selling_price' => 2500,
                'supplier_id' => $suppliers->first()->id,
                'received_date' => now()->subDays(5),
            ],
            [
                'medicine_id' => $medicines->where('name', 'Salbutamol')->first()->id,
                'batch_number' => 'SAL001',
                'expiry_date' => now()->addMonths(30),
                'quantity' => 75,
                'cost_price' => 25000,
                'selling_price' => 42000,
                'supplier_id' => $suppliers->skip(1)->first()->id,
                'received_date' => now()->subDays(20),
            ],
        ];

        foreach ($inventoryData as $data) {
            Inventory::create($data);
        }
    }
}
