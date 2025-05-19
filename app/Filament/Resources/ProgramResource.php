<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Program';
    protected static ?string $navigationGroup = 'Master Data';

   public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('kode')
                ->required()
                ->maxLength(20)
                ->label('Kode Program'),

            Forms\Components\TextInput::make('nama_program')
                ->required()
                ->maxLength(255)
                ->label('Nama Program'),

            Forms\Components\TextInput::make('tahun_anggaran')
                ->required()
                ->numeric()
                ->label('Tahun Anggaran'),

            Forms\Components\TextInput::make('total_anggaran')
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
              Tables\Columns\TextColumn::make('kode')->label('Kode'),
                Tables\Columns\TextColumn::make('nama_program')->label('Nama'),
                Tables\Columns\TextColumn::make('tahun_anggaran')->label('Tahun Anggaran'),
                Tables\Columns\TextColumn::make('total_anggaran')
                    ->label('Anggaran')
                    ->money('IDR'),
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
