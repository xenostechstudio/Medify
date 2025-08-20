<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->tabs([
                        Tabs\Tab::make('General')
                            ->components([
                                TextInput::make('name')
                                    ->label('Full Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('e.g., Ahmad Rizki Pratama')
                                    ->helperText('Customer full name as per ID'),
                            ]),
                        Tabs\Tab::make('Contact')
                            ->components([
                                TextInput::make('phone')
                                    ->label('Phone Number')
                                    ->tel()
                                    ->maxLength(20)
                                    ->placeholder('+62 812 3456 7890')
                                    ->helperText('Primary contact number'),
                                TextInput::make('email')
                                    ->label('Email Address')
                                    ->email()
                                    ->maxLength(255)
                                    ->placeholder('customer@email.com')
                                    ->helperText('For digital receipts and notifications'),
                            ]),
                        Tabs\Tab::make('Address')
                            ->components([
                                Textarea::make('address')
                                    ->label('Address')
                                    ->placeholder('Complete address including street, city, and postal code...')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->maxLength(500)
                                    ->helperText('Full address for delivery purposes'),
                            ]),
                        Tabs\Tab::make('Medical')
                            ->components([
                                DatePicker::make('date_of_birth')
                                    ->label('Date of Birth')
                                    ->maxDate(now())
                                    ->displayFormat('d/m/Y')
                                    ->helperText('Used for age verification and prescriptions'),
                                Select::make('gender')
                                    ->label('Gender')
                                    ->options([
                                        'male' => 'Male',
                                        'female' => 'Female',
                                        'other' => 'Other',
                                    ])
                                    ->placeholder('Select gender')
                                    ->helperText('Required for certain medications'),
                                Textarea::make('allergies')
                                    ->label('Known Allergies')
                                    ->placeholder('List any known drug allergies or food allergies that may affect medication...')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->maxLength(1000)
                                    ->helperText('Critical for preventing adverse drug reactions'),
                
                                    Textarea::make('medical_conditions')
                                    ->label('Medical Conditions')
                                    ->placeholder('List ongoing medical conditions, chronic diseases, or relevant medical history...')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->maxLength(1000)
                                    ->helperText('Helps pharmacist provide appropriate medication counseling'),
                                        
                                    Toggle::make('is_active')
                                    ->label('Active Status')
                                    ->default(true)
                                    ->required()
                                    ->helperText('Inactive customers will be archived'),
                            ])
                        ])
            ]);
    }
}
