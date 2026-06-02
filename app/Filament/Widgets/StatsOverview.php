<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Revenue', 'IDR ' . number_format(\App\Models\Order::sum('total_amount'), 0, ',', '.'))
                ->description('Total pendapatan dari seluruh pesanan')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Orders', \App\Models\Order::count())
                ->description('Total pesanan masuk')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),
            Stat::make('Total Products', \App\Models\Product::count())
                ->description('Jumlah produk aktif di katalog')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('gray'),
        ];
    }
}
