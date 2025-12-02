<?php

namespace App\Filament\Resources\StudentRegistrations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StudentRegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->required(),
                TextInput::make('birth_place')
                    ->required(),
                DatePicker::make('birth_date')
                    ->required(),
                TextInput::make('gender')
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('parent_name')
                    ->required(),
                TextInput::make('parent_phone')
                    ->tel()
                    ->required(),
                TextInput::make('parent_email')
                    ->email(),
                TextInput::make('parent_occupation'),
                TextInput::make('program_id')
                    ->numeric(),
                Textarea::make('program_notes')
                    ->columnSpanFull(),
                TextInput::make('photo'),
                TextInput::make('birth_certificate'),
                TextInput::make('family_card'),
                TextInput::make('health_certificate'),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                Textarea::make('admin_notes')
                    ->columnSpanFull(),
                DateTimePicker::make('submitted_at'),
                DateTimePicker::make('verified_at'),
            ]);
    }
}
