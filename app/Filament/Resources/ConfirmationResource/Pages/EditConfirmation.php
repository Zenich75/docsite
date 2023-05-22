<?php

namespace App\Filament\Resources\ConfirmationResource\Pages;

use App\Filament\Resources\ConfirmationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConfirmation extends EditRecord
{
    protected static string $resource = ConfirmationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
