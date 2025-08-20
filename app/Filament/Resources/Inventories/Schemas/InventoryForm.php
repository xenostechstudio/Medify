<?php

namespace App\Filament\Resources\Inventories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;

class InventoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('medicine_id')
                    ->label('Medicine')
                    ->relationship('medicine', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->helperText('Select the medicine for this inventory entry'),
                
                Select::make('supplier_id')
                    ->label('Supplier')
                    ->relationship('supplier', 'name')
                    ->searchable()
                    ->preload()
                    ->helperText('Source supplier for this batch'),
                
                TextInput::make('batch_number')
                    ->label('Batch Number')
                    ->required()
                    ->maxLength(50)
                    ->placeholder('e.g., BTH2024001')
                    ->helperText('Manufacturer batch/lot number'),
                
                DatePicker::make('received_date')
                    ->label('Date Received')
                    ->required()
                    ->default(now())
                    ->maxDate(now())
                    ->displayFormat('d/m/Y')
                    ->helperText('Date when inventory was received'),
                
                DatePicker::make('expiry_date')
                    ->label('Expiry Date')
                    ->required()
                    ->minDate(now())
                    ->displayFormat('d/m/Y')
                    ->helperText('Product expiration date - must be future date'),
                
                TextInput::make('quantity')
                    ->label('Quantity')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->step(1)
                    ->placeholder('0')
                    ->helperText('Number of units in stock')
                    ->suffix('units'),
                
                TextInput::make('cost_price')
                    ->label('Cost Price')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->placeholder('0.00')
                    ->prefix('Rp')
                    ->helperText('Purchase cost per unit'),
                
                TextInput::make('selling_price')
                    ->label('Selling Price')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->placeholder('0.00')
                    ->prefix('Rp')
                    ->helperText('Retail selling price per unit'),
            ]);
    }
}
