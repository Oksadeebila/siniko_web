<?php

namespace App\Filament\Resources\RealisasiBulananResource\Pages;

use App\Filament\Resources\RealisasiBulananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRealisasiBulanan extends EditRecord
{
    protected static string $resource = RealisasiBulananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
