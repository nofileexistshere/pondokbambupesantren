<?php

namespace App\Filament\Resources\RegularDonors\Pages;

use App\Filament\Resources\RegularDonors\RegularDonorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRegularDonor extends EditRecord
{
    protected static string $resource = RegularDonorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
