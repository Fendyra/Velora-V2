<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LatestOrders extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Order::query()->latest()->limit(5))
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('order_number')
                    ->label('Order #')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('customer_name')
                    ->label('Customer'),
                \Filament\Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'primary',
                        'shipped' => 'success',
                        'completed' => 'gray',
                        'cancelled' => 'danger',
                        default => 'secondary',
                    }),
                \Filament\Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total')
                    ->money('IDR'),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
