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
                    ->required(),
                TextInput::make('generic_name'),
                TextInput::make('brand'),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('manufacturer'),
                TextInput::make('dosage_form')
                    ->required(),
                TextInput::make('strength'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('barcode'),
                TextInput::make('min_stock_level')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('requires_prescription')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
