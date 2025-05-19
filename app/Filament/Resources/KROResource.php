<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KROResource\Pages;
use App\Filament\Resources\KROResource\RelationManagers;
use App\Models\KRO;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KROResource extends Resource
{
    protected static ?string $model = KRO::class;
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Select::make('activity_id')
                ->relationship('activity', 'nama_kegiatan')
                ->label('kegiatan')
                ->reactive(),

                 TextInput::make('kode_suffix')
                ->label('Kode Tambahan')
                ->required()
                ->live()
                ->afterStateUpdated(function (Set $set, Get $get) {
                    $activity = \App\Models\Activity::find($get('activity_id'));
                    if ($activity && $get('kode_suffix')) {
                        $set('kode', $activity->kode . '.' . $get('kode_suffix'));
                    }
                }),

            TextInput::make('kode')
             ->label('Kode KRO Lengkap')
                ->disabled()
                ->dehydrated() // <== penting: agar tetap disimpan
                ->required()
                ->afterStateHydrated(function ($set, $record) {
                    if ($record) {
                        $set('kode', $record->kode);
                    }
                })
                ->live(),
                
        TextInput::make('nama_kro')
            ->required()
            ->label('Nama KRO'),

        TextInput::make('volume')
            ->numeric()
            ->default(0)
            ->label('Volume'),

        TextInput::make('satuan')
            ->label('Satuan'),

        TextInput::make('total_anggaran')
            ->required()
            ->numeric()
            ->prefix('Rp')
            ->label('Total Anggaran'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('kode')->label('Kode'),
            TextColumn::make('nama_kro')->label('Nama KRO'),
            TextColumn::make('activity.nama_kegiatan')->label('Kegiatan'),
            TextColumn::make('volume')->label('Volume'),
            TextColumn::make('satuan')->label('Satuan'),
            TextColumn::make('total_anggaran')->money('IDR')->label('Anggaran'),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKROS::route('/'),
            'create' => Pages\CreateKRO::route('/create'),
            'edit' => Pages\EditKRO::route('/{record}/edit'),
        ];
    }
}
