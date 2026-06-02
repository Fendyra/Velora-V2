<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_number')
                    ->required(),
                TextInput::make('customer_name'),
                TextInput::make('customer_email')
                    ->email(),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                TextInput::make('shipping_method'),
                TextInput::make('shipping_fee')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
