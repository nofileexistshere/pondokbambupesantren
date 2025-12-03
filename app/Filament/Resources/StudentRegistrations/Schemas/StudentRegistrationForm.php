<?php

namespace App\Filament\Resources\StudentRegistrations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

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
                FileUpload::make('photo')
                    ->disk('public')
                    ->directory('registrations/photos')
                    ->image()
                    ->visibility('public')
                    ->preserveFilenames()
                    ->required(),
                FileUpload::make('birth_certificate')
                    ->disk('public')
                    ->visibility('public')
                    ->directory('registrations/documents')
                    ->preserveFilenames()
                    ->required(),
                FileUpload::make('family_card')
                    ->disk('public')
                    ->visibility('public')
                    ->directory('registrations/documents')
                    ->preserveFilenames()
                    ->required(),
                FileUpload::make('health_certificate')
                    ->disk('public')
                    ->visibility('public')
                    ->directory('registrations/documents')
                    ->preserveFilenames()
                    ->required(),
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
