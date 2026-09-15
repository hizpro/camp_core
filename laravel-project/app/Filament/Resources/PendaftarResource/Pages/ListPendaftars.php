<?php

namespace App\Filament\Resources\PendaftarResource\Pages;

use App\Filament\Resources\PendaftarResource;
use App\Models\Pendaftar;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListPendaftars extends ListRecords
{
    protected static string $resource = PendaftarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Pendaftar'),

            // Export action
            Actions\Action::make('export')
                ->label('Export CSV')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    $pendaftars = Pendaftar::all();
                    $filename = 'pendaftars_' . date('Y-m-d') . '.csv';

                    $headers = [
                        'Content-Type' => 'text/csv',
                        'Content-Disposition' => "attachment; filename=\"{$filename}\"",
                    ];

                    $callback = function () use ($pendaftars) {
                        $file = fopen('php://output', 'w');

                        // Header row
                        fputcsv($file, [
                            'No. Pendaftaran', 'Nama', 'Email', 'No. HP',
                            'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin',
                            'Alamat', 'Asal Sekolah', 'Tahun Lulus',
                            'Program Studi', 'Nama Ortu', 'No. HP Ortu',
                            'Status', 'Tanggal Daftar'
                        ]);

                        // Data rows
                        foreach ($pendaftars as $p) {
                            fputcsv($file, [
                                $p->no_pendaftaran,
                                $p->full_name,
                                $p->email,
                                $p->phone,
                                $p->birth_place,
                                $p->birth_date,
                                $p->gender === 'L' ? 'Laki-laki' : 'Perempuan',
                                $p->address,
                                $p->school,
                                $p->graduation_year,
                                $p->program,
                                $p->parent_name,
                                $p->parent_phone,
                                $p->status,
                                $p->created_at->format('d-m-Y H:i'),
                            ]);
                        }

                        fclose($file);
                    };

                    return response()->stream($callback, 200, $headers);
                }),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PendaftarResource\Widgets\PendaftarStatsOverview::class,
        ];
    }
}
