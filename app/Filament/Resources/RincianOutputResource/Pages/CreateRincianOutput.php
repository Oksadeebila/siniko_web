<?php

namespace App\Filament\Resources\RincianOutputResource\Pages;

use App\Filament\Resources\RincianOutputResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRincianOutput extends CreateRecord
{
    protected static string $resource = RincianOutputResource::class;

    

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
