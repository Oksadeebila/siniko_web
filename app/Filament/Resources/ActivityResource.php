<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Kegiatan';
    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
        Select::make('program_id')
            ->relationship('program', 'nama_program')
            ->required()
            ->label('Program'),
        Select::make('tahun_anggaran_id')
            ->relationship('tahunAnggaran', 'tahun')
            ->required()
            ->label('Tahun Anggaran'),

        TextInput::make('kode')
            ->required()
            ->label('Kode Kegiatan'),

        TextInput::make('nama_kegiatan')
            ->required()
            ->label('Nama Kegiatan'),

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
            SelectFilter::make('tahun_anggaran_id')
            ->relationship('tahunAnggaran', 'tahun')
            ->label('Tahun Anggaran'),
            TextColumn::make('nama_kegiatan')->label('Nama'),
            TextColumn::make('program.nama_program')->label('Program'),
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
