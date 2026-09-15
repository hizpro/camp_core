<?php

namespace App\Filament\Resources\PendaftarResource\Pages;

use App\Filament\Resources\PendaftarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendaftar extends EditRecord
{
    protected static string $resource = PendaftarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus Pendaftar'),

            // Quick status change actions
            Actions\Action::make('approve')
                ->label('Setujui')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->update([
                        'status' => 'verified',
                        'verified_at' => now(),
                    ]);
                    $this->fillForm();
                })
                ->visible(fn () => $this->record->status === 'pending'),

            Actions\Action::make('reject')
                ->label('Tolak')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->update([
                        'status' => 'rejected',
                    ]);
                    $this->fillForm();
                })
                ->visible(fn () => $this->record->status === 'pending'),

            Actions\Action::make('reset')
                ->label('Reset ke Pending')
                ->icon('heroicon-o-arrow-path')
                ->color('warning')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->update([
                        'status' => 'pending',
                        'verified_at' => null,
                    ]);
                    $this->fillForm();
                })
                ->visible(fn () => $this->record->status !== 'pending'),
        ];
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data pendaftar berhasil diperbarui';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
