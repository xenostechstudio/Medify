<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Category Name')
                    ->required()
                    ->maxLength(100)
                    ->unique(ignoreRecord: true)
                    ->placeholder('e.g., Antibiotics, Pain Relief')
                    ->helperText('Enter a unique name for the category'),
                
                Textarea::make('description')
                    ->label('Description')
                    ->placeholder('Describe the types of medicines in this category...')
                    ->rows(3)
                    ->columnSpanFull()
                    ->maxLength(500)
                    ->helperText('Optional description to help identify the category purpose'),
                
                Toggle::make('is_active')
                    ->label('Active Status')
                    ->default(true)
                    ->required()
                    ->helperText('Inactive categories will be hidden from selection'),
            ]);
    }
}
