<?php

namespace App\Filament\Resources\StudentRegistrations;

use App\Filament\Resources\StudentRegistrations\Pages\CreateStudentRegistration;
use App\Filament\Resources\StudentRegistrations\Pages\EditStudentRegistration;
use App\Filament\Resources\StudentRegistrations\Pages\ListStudentRegistrations;
use App\Filament\Resources\StudentRegistrations\Schemas\StudentRegistrationForm;
use App\Filament\Resources\StudentRegistrations\Tables\StudentRegistrationsTable;
use App\Models\StudentRegistration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StudentRegistrationResource extends Resource
{
    protected static ?string $model = StudentRegistration::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return StudentRegistrationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentRegistrationsTable::configure($table);
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
            'index' => ListStudentRegistrations::route('/'),
            'create' => CreateStudentRegistration::route('/create'),
            'edit' => EditStudentRegistration::route('/{record}/edit'),
        ];
    }
}
