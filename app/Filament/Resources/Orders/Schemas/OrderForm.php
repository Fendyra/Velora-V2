<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Order Information')->schema([
                    TextInput::make('order_number')
                        ->required(),
                    Select::make('status')
                        ->options([
                            'pending' => 'Pending',
                            'processing' => 'Processing',
                            'shipped' => 'Shipped',
                            'completed' => 'Completed',
                            'cancelled' => 'Cancelled',
                        ])
                        ->required()
                        ->default('pending'),
                    TextInput::make('total_amount')
                        ->required()
                        ->numeric()
                        ->default(0),
                ])->columns(3),

                Section::make('Customer & Shipping')->schema([
                    TextInput::make('customer_name'),
                    TextInput::make('customer_email')
                        ->email(),
                    TextInput::make('phone')
                        ->tel(),
                    TextInput::make('city'),
                    TextInput::make('postcode'),
                    Textarea::make('address')
                        ->columnSpanFull(),
                    TextInput::make('shipping_method'),
                    TextInput::make('shipping_fee')
                        ->required()
                        ->numeric()
                        ->default(0),
                ])->columns(2),

                Section::make('Order Items')->schema([
                    Repeater::make('items')
                        ->relationship()
                        ->schema([
                            TextInput::make('product_name')->required(),
                            TextInput::make('size'),
                            TextInput::make('color'),
                            TextInput::make('quantity')->numeric()->required(),
                            TextInput::make('price')->numeric()->required(),
                        ])
                        ->columns(5)
                        ->disableItemCreation()
                        ->disableItemDeletion()
                        ->disableItemMovement()
                ])
            ]);
    }
}
