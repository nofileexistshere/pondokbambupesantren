<?php

namespace App\Filament\Resources\RegularDonors\Pages;

use App\Filament\Resources\RegularDonors\RegularDonorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRegularDonors extends ListRecords
{
    protected static string $resource = RegularDonorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
