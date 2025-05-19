<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RealisasiBulananResource\Pages;
use App\Filament\Resources\RealisasiBulananResource\RelationManagers;
use App\Models\RealisasiBulanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RealisasiBulananResource extends Resource
{
    protected static ?string $model = RealisasiBulanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('rincian_output_id')
                    ->label('Rincian Output')
                    ->relationship('rincianOutput', 'nama_rincian_output')
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('bulan')
                    ->required()
                    ->maxLength(20)
                    ->placeholder('Contoh: Maret'),

                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(2100),

                Forms\Components\TextInput::make('realisasi_fisik')
                    ->label('Realisasi Fisik (%)')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('realisasi_anggaran')
                    ->label('Realisasi Anggaran (Rp)')
                    ->numeric()
                    ->required(),

                Forms\Components\Textarea::make('keterangan')
                    ->maxLength(255)
                    ->placeholder('Opsional'),

                Forms\Components\TextInput::make('perubahan_anggaran')
                    ->label('Perubahan Anggaran (jika ada)')
                    ->numeric()
                    ->default(0)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rincianOutput.nama_rincian_output')->label('Rincian Output')->searchable(),
                Tables\Columns\TextColumn::make('bulan'),
                Tables\Columns\TextColumn::make('tahun'),
                Tables\Columns\TextColumn::make('realisasi_fisik')->label('Fisik (%)'),
                Tables\Columns\TextColumn::make('realisasi_anggaran')->label('Anggaran')->money('IDR'),
                Tables\Columns\TextColumn::make('perubahan_anggaran')->label('Perubahan')->money('IDR'),
                Tables\Columns\TextColumn::make('keterangan')->limit(30),
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
            'index' => Pages\ListRealisasiBulanans::route('/'),
            'create' => Pages\CreateRealisasiBulanan::route('/create'),
            'edit' => Pages\EditRealisasiBulanan::route('/{record}/edit'),
        ];
    }
}
