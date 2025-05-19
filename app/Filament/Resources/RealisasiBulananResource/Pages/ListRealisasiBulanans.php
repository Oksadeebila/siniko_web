<?php

namespace App\Filament\Resources\RealisasiBulananResource\Pages;

use App\Filament\Resources\RealisasiBulananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRealisasiBulanans extends ListRecords
{
    protected static string $resource = RealisasiBulananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
