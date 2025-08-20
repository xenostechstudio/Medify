<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Antibiotics', 'description' => 'Medications that fight bacterial infections'],
            ['name' => 'Pain Relief', 'description' => 'Analgesics and anti-inflammatory drugs'],
            ['name' => 'Cardiovascular', 'description' => 'Heart and blood vessel medications'],
            ['name' => 'Diabetes', 'description' => 'Blood sugar management medications'],
            ['name' => 'Respiratory', 'description' => 'Lung and breathing medications'],
            ['name' => 'Vitamins & Supplements', 'description' => 'Nutritional supplements and vitamins'],
            ['name' => 'Dermatology', 'description' => 'Skin care and treatment medications'],
            ['name' => 'Gastrointestinal', 'description' => 'Digestive system medications'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
