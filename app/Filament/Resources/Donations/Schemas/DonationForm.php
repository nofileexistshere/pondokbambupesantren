<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DonationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('donation_campaign_id')
                    ->required()
                    ->numeric(),
                TextInput::make('donor_name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Textarea::make('message')
                    ->columnSpanFull(),
                Toggle::make('is_recurring')
                    ->required(),
                TextInput::make('payment_method')
                    ->required()
                    ->default('QRIS'),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                TextInput::make('payment_reference'),
                DateTimePicker::make('paid_at'),
                Toggle::make('is_anonymous')
                    ->required(),
            ]);
    }
}
