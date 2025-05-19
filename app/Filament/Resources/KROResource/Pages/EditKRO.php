<?php

namespace App\Filament\Resources\KROResource\Pages;

use App\Filament\Resources\KROResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKRO extends EditRecord
{
    protected static string $resource = KROResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
