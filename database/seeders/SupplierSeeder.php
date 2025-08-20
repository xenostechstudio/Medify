<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'PT. Pharma Indah',
                'contact_person' => 'John Doe',
                'phone' => '+62-21-5551234',
                'email' => 'contact@pharmaindah.com',
                'address' => 'Jl. Kesehatan No. 123, Jakarta',
                'tax_number' => '01.234.567.8-901.000',
            ],
            [
                'name' => 'CV. Medika Sejahtera',
                'contact_person' => 'Jane Smith',
                'phone' => '+62-21-5555678',
                'email' => 'sales@medikasejahtera.com',
                'address' => 'Jl. Apotek Raya No. 456, Bandung',
                'tax_number' => '02.345.678.9-012.000',
            ],
            [
                'name' => 'PT. Kimia Farma Tbk',
                'contact_person' => 'Ahmad Santoso',
                'phone' => '+62-21-5559999',
                'email' => 'b2b@kimiafarma.co.id',
                'address' => 'Jl. Veterans No. 9, Jakarta',
                'tax_number' => '03.456.789.0-123.000',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
