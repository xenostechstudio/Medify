<?php

namespace Database\Seeders;

use App\Models\Medicine;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $medicines = [
            [
                'name' => 'Paracetamol',
                'generic_name' => 'Acetaminophen',
                'brand' => 'Panadol',
                'category_id' => Category::where('name', 'Pain Relief')->first()->id,
                'manufacturer' => 'GSK',
                'dosage_form' => 'Tablet',
                'strength' => '500mg',
                'description' => 'Pain reliever and fever reducer',
                'min_stock_level' => 50,
                'requires_prescription' => false,
            ],
            [
                'name' => 'Amoxicillin',
                'generic_name' => 'Amoxicillin',
                'brand' => 'Amoxil',
                'category_id' => Category::where('name', 'Antibiotics')->first()->id,
                'manufacturer' => 'Pfizer',
                'dosage_form' => 'Capsule',
                'strength' => '250mg',
                'description' => 'Antibiotic for bacterial infections',
                'min_stock_level' => 30,
                'requires_prescription' => true,
            ],
            [
                'name' => 'Metformin',
                'generic_name' => 'Metformin HCl',
                'brand' => 'Glucophage',
                'category_id' => Category::where('name', 'Diabetes')->first()->id,
                'manufacturer' => 'Bristol-Myers Squibb',
                'dosage_form' => 'Tablet',
                'strength' => '500mg',
                'description' => 'Diabetes medication to control blood sugar',
                'min_stock_level' => 40,
                'requires_prescription' => true,
            ],
            [
                'name' => 'Vitamin C',
                'generic_name' => 'Ascorbic Acid',
                'brand' => 'Redoxon',
                'category_id' => Category::where('name', 'Vitamins & Supplements')->first()->id,
                'manufacturer' => 'Bayer',
                'dosage_form' => 'Tablet',
                'strength' => '1000mg',
                'description' => 'Vitamin C supplement for immune support',
                'min_stock_level' => 100,
                'requires_prescription' => false,
            ],
            [
                'name' => 'Salbutamol',
                'generic_name' => 'Salbutamol',
                'brand' => 'Ventolin',
                'category_id' => Category::where('name', 'Respiratory')->first()->id,
                'manufacturer' => 'GSK',
                'dosage_form' => 'Inhaler',
                'strength' => '100mcg',
                'description' => 'Bronchodilator for asthma and COPD',
                'min_stock_level' => 20,
                'requires_prescription' => true,
            ],
        ];

        foreach ($medicines as $medicine) {
            Medicine::create($medicine);
        }
    }
}
