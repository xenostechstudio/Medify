<?php

namespace App\Filament\Widgets;

use App\Models\Medicine;
use App\Models\Inventory;
use App\Models\Category;
use App\Models\Sale;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StockOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalMedicines = Medicine::count();
        $totalStock = Inventory::sum('quantity');
        $lowStockMedicines = Medicine::whereHas('inventory', function ($query) {
            $query->havingRaw('SUM(quantity) <= medicines.min_stock_level');
        })->count();
        $expiringItems = Inventory::where('expiry_date', '<=', now()->addDays(30))->sum('quantity');
        $todaySales = Sale::whereDate('created_at', today())->sum('total_amount');

        return [
            Stat::make('Total Medicines', $totalMedicines)
                ->description('Active medicines in catalog')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('primary'),

            Stat::make('Total Stock', number_format($totalStock))
                ->description('Units in inventory')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success'),

            Stat::make('Low Stock Alert', $lowStockMedicines)
                ->description('Medicines below minimum level')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color($lowStockMedicines > 0 ? 'danger' : 'success'),

            Stat::make('Expiring Soon', number_format($expiringItems))
                ->description('Items expiring in 30 days')
                ->descriptionIcon('heroicon-m-clock')
                ->color($expiringItems > 0 ? 'warning' : 'success'),

            Stat::make("Today's Sales", 'Rp ' . number_format($todaySales))
                ->description('Revenue today')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('info'),
        ];
    }
}
