<?php

namespace App\Filament\Resources\PendaftarResource\Widgets;

use App\Models\Pendaftar;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PendaftarStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $total = Pendaftar::count();
        $pending = Pendaftar::where('status', 'pending')->count();
        $verified = Pendaftar::where('status', 'verified')->count();
        $rejected = Pendaftar::where('status', 'rejected')->count();

        // Hitung pendaftar hari ini
        $today = Pendaftar::whereDate('created_at', today())->count();

        // Hitung pendaftar minggu ini
        $thisWeek = Pendaftar::whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek(),
        ])->count();

        return [
            Stat::make('Total Pendaftar', $total)
                ->description("{$today} pendaftar hari ini")
                ->descriptionIcon('heroicon-o-user-group')
                ->color('primary'),

            Stat::make('Menunggu Verifikasi', $pending)
                ->description('Perlu ditinjau')
                ->descriptionIcon('heroicon-o-clock')
                ->color('warning'),

            Stat::make('Terverifikasi', $verified)
                ->description(number_format(($total > 0 ? ($verified / $total) * 100 : 0), 1) . '% dari total')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Ditolak', $rejected)
                ->description(number_format(($total > 0 ? ($rejected / $total) * 100 : 0), 1) . '% dari total')
                ->descriptionIcon('heroicon-o-x-circle')
                ->color('danger'),
        ];
    }
}
