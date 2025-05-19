<?php

namespace App\Filament\Resources\KROResource\Pages;

use App\Filament\Resources\KROResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKROS extends ListRecords
{
    protected static string $resource = KROResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
