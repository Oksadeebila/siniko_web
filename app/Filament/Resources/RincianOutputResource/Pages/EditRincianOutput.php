<?php

namespace App\Filament\Resources\RincianOutputResource\Pages;

use App\Filament\Resources\RincianOutputResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRincianOutput extends EditRecord
{
    protected static string $resource = RincianOutputResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
