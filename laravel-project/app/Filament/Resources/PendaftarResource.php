<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftarResource\Pages;
use App\Models\Pendaftar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Enums\FiltersLayout;

class PendaftarResource extends Resource
{
    protected static ?string $model = Pendaftar::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Data Pendaftar';

    protected static ?string $pluralLabel = 'Pendaftar';

    protected static ?string $modelLabel = 'Pendaftar';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'PMB';

    /**
     * Form schema untuk create/edit pendaftar
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Pribadi')
                    ->schema([
                        Forms\Components\TextInput::make('no_pendaftaran')
                            ->label('No. Pendaftaran')
                            ->disabled()
                            ->dehydrated()
                            ->default(fn () => Pendaftar::generateNoPendaftaran())
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('full_name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('phone')
                            ->label('No. Telepon')
                            ->tel()
                            ->required()
                            ->maxLength(20),

                        Forms\Components\TextInput::make('birth_place')
                            ->label('Tempat Lahir')
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('birth_date')
                            ->label('Tanggal Lahir'),

                        Forms\Components\Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->options([
                                'L' => 'Laki-laki',
                                'P' => 'Perempuan',
                            ])
                            ->required(),

                        Forms\Components\Textarea::make('address')
                            ->label('Alamat')
                            ->columnSpanFull()
                            ->rows(2),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Data Pendidikan')
                    ->schema([
                        Forms\Components\TextInput::make('school')
                            ->label('Asal Sekolah')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('graduation_year')
                            ->label('Tahun Lulus')
                            ->maxLength(4),

                        Forms\Components\Select::make('program')
                            ->label('Program Studi')
                            ->options([
                                'Teknik Informatika' => 'Teknik Informatika',
                                'Sistem Informasi' => 'Sistem Informasi',
                                'Teknik Komputer' => 'Teknik Komputer',
                                'Kecerdasan Buatan' => 'Kecerdasan Buatan',
                                'Keamanan Siber' => 'Keamanan Siber',
                                'Teknik Telekomunikasi' => 'Teknik Telekomunikasi',
                                'Data Science' => 'Data Science',
                                'Desain Digital' => 'Desain Digital',
                            ])
                            ->required()
                            ->searchable(),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Data Orang Tua/Wali')
                    ->schema([
                        Forms\Components\TextInput::make('parent_name')
                            ->label('Nama Orang Tua/Wali')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('parent_phone')
                            ->label('No. Telepon Orang Tua')
                            ->tel()
                            ->maxLength(20),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Verifikasi')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status Verifikasi')
                            ->options([
                                'pending' => 'Menunggu Verifikasi',
                                'verified' => 'Terverifikasi (Diterima)',
                                'rejected' => 'Ditolak',
                            ])
                            ->required()
                            ->default('pending')
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state === 'verified') {
                                    $set('verified_at', now());
                                }
                            }),

                        Forms\Components\DateTimePicker::make('verified_at')
                            ->label('Tanggal Verifikasi')
                            ->disabled()
                            ->dehydrated(),

                        Forms\Components\Textarea::make('admin_notes')
                            ->label('Catatan Admin')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Tambahkan catatan internal untuk pendaftar ini...'),
                    ])
                    ->columns(2),
            ]);
    }

    /**
     * Table columns dan actions untuk daftar pendaftar
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_pendaftaran')
                    ->label('No. Daftar')
                    ->searchable()
                    ->copyable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->description(fn (Pendaftar $record): string => $record->email),

                Tables\Columns\TextColumn::make('phone')
                    ->label('No. HP')
                    ->searchable()
                    ->copyable(),

                Tables\Columns\TextColumn::make('program')
                    ->label('Program Studi')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('gender')
                    ->label('L/P')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'L' => 'blue',
                        'P' => 'pink',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'verified' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'pending' => 'heroicon-o-clock',
                        'verified' => 'heroicon-o-check-circle',
                        'rejected' => 'heroicon-o-x-circle',
                        default => 'heroicon-o-question-mark-circle',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Update')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status Verifikasi')
                    ->options([
                        'pending' => 'Menunggu Verifikasi',
                        'verified' => 'Terverifikasi',
                        'rejected' => 'Ditolak',
                    ])
                    ->multiple(),

                Tables\Filters\SelectFilter::make('program')
                    ->label('Program Studi')
                    ->options([
                        'Teknik Informatika' => 'Teknik Informatika',
                        'Sistem Informasi' => 'Sistem Informasi',
                        'Teknik Komputer' => 'Teknik Komputer',
                        'Kecerdasan Buatan' => 'Kecerdasan Buatan',
                        'Keamanan Siber' => 'Keamanan Siber',
                        'Teknik Telekomunikasi' => 'Teknik Telekomunikasi',
                        'Data Science' => 'Data Science',
                        'Desain Digital' => 'Desain Digital',
                    ])
                    ->multiple()
                    ->searchable(),

                Tables\Filters\SelectFilter::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ]),

                Tables\Filters\Filter::make('created_at')
                    ->label('Tanggal Pendaftaran')
                    ->form([
                        Forms\Components\DatePicker::make('registered_from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('registered_until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['registered_from'], fn ($q, $date) => $q->whereDate('created_at', '>=', $date))
                            ->when($data['registered_until'], fn ($q, $date) => $q->whereDate('created_at', '<=', $date));
                    }),
            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(4)
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Detail'),

                Tables\Actions\EditAction::make()
                    ->label('Edit'),

                // Quick approve action
                Tables\Actions\Action::make('approve')
                    ->label('Setujui')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Setujui Pendaftar')
                    ->modalDescription('Apakah Anda yakin ingin menyetujui pendaftar ini?')
                    ->modalSubmitActionLabel('Ya, Setujui')
                    ->action(fn (Pendaftar $record) => $record->update([
                        'status' => 'verified',
                        'verified_at' => now(),
                    ]))
                    ->visible(fn (Pendaftar $record): bool => $record->status === 'pending'),

                // Quick reject action
                Tables\Actions\Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Tolak Pendaftar')
                    ->modalDescription('Apakah Anda yakin ingin menolak pendaftar ini?')
                    ->modalSubmitActionLabel('Ya, Tolak')
                    ->action(fn (Pendaftar $record) => $record->update([
                        'status' => 'rejected',
                    ]))
                    ->visible(fn (Pendaftar $record): bool => $record->status === 'pending'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Terpilih'),

                    // Bulk approve
                    Tables\Actions\BulkAction::make('bulk_approve')
                        ->label('Setujui Terpilih')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(fn (\Illuminate\Database\Eloquent\Collection $records) => $records->each(fn (Pendaftar $r) => $r->update(['status' => 'verified', 'verified_at' => now()]))),

                    // Bulk reject
                    Tables\Actions\BulkAction::make('bulk_reject')
                        ->label('Tolak Terpilih')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(fn (\Illuminate\Database\Eloquent\Collection $records) => $records->each(fn (Pendaftar $r) => $r->update(['status' => 'rejected']))),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->poll('30s');
    }

    /**
     * Export header untuk export data
     */
    public static function getExportHeaders(): array
    {
        return [
            'No. Pendaftaran',
            'Nama Lengkap',
            'Email',
            'No. Telepon',
            'Jenis Kelamin',
            'Program Studi',
            'Asal Sekolah',
            'Status',
            'Tanggal Daftar',
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendaftars::route('/'),
            'create' => Pages\CreatePendaftar::route('/create'),
            'edit' => Pages\EditPendaftar::route('/{record}/edit'),
        ];
    }

    /**
     * Widget stats di atas tabel
     */
    public static function getWidgets(): array
    {
        return [
            PendaftarResource\Widgets\PendaftarStatsOverview::class,
        ];
    }
}
