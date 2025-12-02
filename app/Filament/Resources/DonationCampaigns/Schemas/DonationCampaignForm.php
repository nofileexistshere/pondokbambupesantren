<?php

namespace App\Filament\Resources\DonationCampaigns\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DonationCampaignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('icon'),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('target_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('current_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('donor_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('percentage')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
