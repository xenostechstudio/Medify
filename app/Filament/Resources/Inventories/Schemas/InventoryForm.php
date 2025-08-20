<?php

namespace App\Filament\Resources\Inventories\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InventoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('medicine_id')
                    ->relationship('medicine', 'name')
                    ->required(),
                TextInput::make('batch_number')
                    ->required(),
                DatePicker::make('expiry_date')
                    ->required(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                TextInput::make('cost_price')
                    ->required()
                    ->numeric(),
                TextInput::make('selling_price')
                    ->required()
                    ->numeric(),
                Select::make('supplier_id')
                    ->relationship('supplier', 'name'),
                DatePicker::make('received_date')
                    ->required(),
            ]);
    }
}
