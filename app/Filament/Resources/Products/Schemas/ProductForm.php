<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sku')
                    ->label('SKU')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('collection'),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('$'),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('products'),
                TextInput::make('tag'),
                TextInput::make('category'),
                \Filament\Forms\Components\TagsInput::make('sizes'),
                \Filament\Forms\Components\TagsInput::make('colors'),
                \Filament\Forms\Components\Textarea::make('description')
                    ->label('Product Description')
                    ->rows(3),
                \Filament\Forms\Components\Textarea::make('details')
                    ->label('Details & Composition')
                    ->rows(3),
                \Filament\Forms\Components\Textarea::make('care_instructions')
                    ->label('Care Instructions')
                    ->rows(3),
                \Filament\Forms\Components\Textarea::make('shipping_returns')
                    ->label('Shipping & Returns')
                    ->rows(3),
            ]);
    }
}
