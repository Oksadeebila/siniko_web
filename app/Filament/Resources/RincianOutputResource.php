<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RincianOutputResource\Pages;
use App\Filament\Resources\RincianOutputResource\RelationManagers;
use App\Models\RincianOutput;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RincianOutputResource extends Resource
{
    protected static ?string $model = RincianOutput::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                Select::make('kro_id')
                ->label('KRO')
                ->relationship('kro', 'nama_kro')
                ->reactive(),

                TextInput::make('kode_suffix')
                ->label('Kode tambahan')
                ->required()
                ->live()
                ->afterStateUpdated(function (Set $set, Get $get) {
                    $kro = \App\Models\Kro::find($get('kro_id'));
                    if($kro && $get('kode_suffix')) {
                        $set('kode', $kro->kode . '.' . $get('kode_suffix'));
                    }
                }),

                 TextInput::make('kode')
                    ->label('Kode Rincian Output lengkap')
                    ->disabled()
                    ->dehydrated() // <== penting: agar tetap disimpan
                    ->required()
                   ->afterStateHydrated(function ($set, $record) {
                    if($record) {
                        $set('kode', $record->kode);
                    }
                   })
                   ->live(),

                TextInput::make('nama_rincian_output')
                ->label('Nomenklatur Rincian Output')
                ->required(),

                TextInput::make('volume')
                ->numeric()
                ->default(0)
                ->label('Volume'),

                TextInput::make('satuan')
                ->label('Satuan'),

                TextInput::make('total_anggaran')
                                ->numeric()
                                ->prefix('Rp')
                                ->label('Total Anggaran'),
                  ])
  
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama_rincian_output')->searchable(),
               Tables\Columns\TextColumn::make('kro.nama_kro')->label('KRO'),
                Tables\Columns\TextColumn::make('volume'),
                Tables\Columns\TextColumn::make('satuan'),
                Tables\Columns\TextColumn::make('total_anggaran')->money('IDR'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListRincianOutputs::route('/'),
            'create' => Pages\CreateRincianOutput::route('/create'),
            'edit' => Pages\EditRincianOutput::route('/{record}/edit'),
        ];
    }
}
