<?php

namespace App\Filament\Resources\Medicines\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MedicineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Medicine Name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g., Paracetamol 500mg')
                    ->helperText('Commercial or brand name of the medicine'),
                
                TextInput::make('generic_name')
                    ->label('Generic Name')
                    ->maxLength(255)
                    ->placeholder('e.g., Acetaminophen')
                    ->helperText('Active ingredient or generic name'),
                
                TextInput::make('brand')
                    ->label('Brand')
                    ->maxLength(100)
                    ->placeholder('e.g., Tylenol, Panadol')
                    ->helperText('Brand or manufacturer brand'),
                
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->helperText('Select the medicine category'),
                
                TextInput::make('manufacturer')
                    ->label('Manufacturer')
                    ->maxLength(100)
                    ->placeholder('e.g., Pfizer, GSK')
                    ->helperText('Medicine manufacturer'),
                
                Select::make('dosage_form')
                    ->label('Dosage Form')
                    ->required()
                    ->options([
                        'tablet' => 'Tablet',
                        'capsule' => 'Capsule',
                        'syrup' => 'Syrup',
                        'injection' => 'Injection',
                        'cream' => 'Cream',
                        'ointment' => 'Ointment',
                        'drops' => 'Drops',
                        'inhaler' => 'Inhaler',
                        'suppository' => 'Suppository',
                        'powder' => 'Powder',
                        'solution' => 'Solution',
                        'other' => 'Other',
                    ])
                    ->searchable()
                    ->helperText('Form of the medicine'),
                
                TextInput::make('strength')
                    ->label('Strength')
                    ->maxLength(50)
                    ->placeholder('e.g., 500mg, 10ml/5ml')
                    ->helperText('Medicine strength or concentration'),
                
                Textarea::make('description')
                    ->label('Description')
                    ->placeholder('Additional information about the medicine...')
                    ->rows(3)
                    ->columnSpanFull()
                    ->maxLength(1000)
                    ->helperText('Optional detailed description'),
                
                TextInput::make('barcode')
                    ->label('Barcode/SKU')
                    ->maxLength(100)
                    ->unique(ignoreRecord: true)
                    ->placeholder('Enter barcode or SKU')
                    ->helperText('Unique identifier for inventory tracking'),
                
                TextInput::make('min_stock_level')
                    ->label('Minimum Stock Level')
                    ->required()
                    ->numeric()
                    ->default(10)
                    ->minValue(0)
                    ->helperText('Alert when stock falls below this level'),
                
                Toggle::make('requires_prescription')
                    ->label('Requires Prescription')
                    ->default(false)
                    ->helperText('Enable if this medicine requires a prescription'),
                
                Toggle::make('is_active')
                    ->label('Active Status')
                    ->default(true)
                    ->required()
                    ->helperText('Inactive medicines will be hidden from selection'),
            ]);
    }
}
