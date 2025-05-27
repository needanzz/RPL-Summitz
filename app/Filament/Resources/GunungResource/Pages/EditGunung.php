<?php

namespace App\Filament\Resources\GunungResource\Pages;

use App\Filament\Resources\GunungResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGunung extends EditRecord
{
    protected static string $resource = GunungResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
