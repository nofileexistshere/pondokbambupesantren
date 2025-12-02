<?php

namespace App\Filament\Resources\RegularDonors;

use App\Filament\Resources\RegularDonors\Pages\CreateRegularDonor;
use App\Filament\Resources\RegularDonors\Pages\EditRegularDonor;
use App\Filament\Resources\RegularDonors\Pages\ListRegularDonors;
use App\Filament\Resources\RegularDonors\Schemas\RegularDonorForm;
use App\Filament\Resources\RegularDonors\Tables\RegularDonorsTable;
use App\Models\RegularDonor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class RegularDonorResource extends Resource
{
    protected static ?string $model = RegularDonor::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-funnel';

    public static function form(Schema $schema): Schema
    {
        return RegularDonorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RegularDonorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRegularDonors::route('/'),
            'create' => CreateRegularDonor::route('/create'),
            'edit' => EditRegularDonor::route('/{record}/edit'),
        ];
    }
}
