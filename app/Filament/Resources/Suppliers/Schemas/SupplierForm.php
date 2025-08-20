<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea; 
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Company Name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g., ABC Pharmaceutical Ltd.')
                    ->helperText('Full legal name of the supplier company'),
                
                TextInput::make('contact_person')
                    ->label('Contact Person')
                    ->maxLength(100)
                    ->placeholder('e.g., John Smith')
                    ->helperText('Main contact person for this supplier'),
                
                TextInput::make('phone')
                    ->label('Phone Number')
                    ->tel()
                    ->maxLength(20)
                    ->placeholder('+62 21 1234 5678')
                    ->helperText('Primary phone number'),
                
                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->maxLength(255)
                    ->placeholder('contact@supplier.com')
                    ->helperText('Primary email contact'),
                
                Textarea::make('address')
                    ->label('Address')
                    ->placeholder('Complete business address including city and postal code...')
                    ->rows(3)
                    ->columnSpanFull()
                    ->maxLength(500)
                    ->helperText('Full business address for deliveries and correspondence'),
                
                TextInput::make('tax_number')
                    ->label('Tax Number / VAT ID')
                    ->maxLength(50)
                    ->placeholder('e.g., 12.345.678.9-123.456')
                    ->helperText('Tax identification number'),
                
                Toggle::make('is_active')
                    ->label('Active Status')
                    ->default(true)
                    ->required()
                    ->helperText('Inactive suppliers will be hidden from selection'),
            ]);
    }
}
