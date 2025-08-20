<?php

namespace App\Filament\Resources\Sales\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;

class SaleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('customer_id')
                    ->label('Customer')
                    ->relationship('customer', 'name')
                    ->searchable()
                    ->preload()
                    ->helperText('Select customer or leave blank for walk-in'),
                
                Hidden::make('user_id')
                    ->default(auth()->id()),
                
                DateTimePicker::make('sale_date')
                    ->label('Sale Date & Time')
                    ->required()
                    ->default(now())
                    ->maxDate(now())
                    ->displayFormat('d/m/Y H:i')
                    ->helperText('Transaction date and time'),
                
                Select::make('status')
                    ->label('Transaction Status')
                    ->required()
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                        'refunded' => 'Refunded',
                    ])
                    ->default('completed')
                    ->helperText('Current status of the transaction'),
                
                TextInput::make('prescription_number')
                    ->label('Prescription Number')
                    ->maxLength(100)
                    ->placeholder('e.g., RX2024001')
                    ->helperText('Reference prescription number if applicable'),
                
                TextInput::make('subtotal')
                    ->label('Subtotal')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->placeholder('0.00')
                    ->prefix('Rp')
                    ->helperText('Subtotal before tax and discount'),
                
                TextInput::make('tax_rate')
                    ->label('Tax Rate (%)')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->step(0.01)
                    ->placeholder('11.00')
                    ->default(11)
                    ->suffix('%')
                    ->helperText('VAT rate (PPN)'),
                
                TextInput::make('tax_amount')
                    ->label('Tax Amount')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->placeholder('0.00')
                    ->prefix('Rp')
                    ->helperText('Calculated tax amount'),
                
                TextInput::make('discount_amount')
                    ->label('Discount Amount')
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->placeholder('0.00')
                    ->prefix('Rp')
                    ->default(0)
                    ->helperText('Total discount applied'),
                
                TextInput::make('total_amount')
                    ->label('Total Amount')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01)
                    ->placeholder('0.00')
                    ->prefix('Rp')
                    ->helperText('Final total amount'),
                
                Select::make('payment_method')
                    ->label('Payment Method')
                    ->required()
                    ->options([
                        'cash' => 'Cash',
                        'credit_card' => 'Credit Card',
                        'debit_card' => 'Debit Card',
                        'bank_transfer' => 'Bank Transfer',
                        'e_wallet' => 'E-Wallet (OVO, GoPay, DANA)',
                        'qris' => 'QRIS',
                        'insurance' => 'Insurance',
                        'other' => 'Other',
                    ])
                    ->default('cash')
                    ->searchable()
                    ->helperText('Payment method used for transaction'),
                
                Textarea::make('notes')
                    ->label('Transaction Notes')
                    ->placeholder('Additional notes about this transaction...')
                    ->rows(2)
                    ->columnSpanFull()
                    ->maxLength(500)
                    ->helperText('Optional notes for this sale'),
            ]);
    }
}
