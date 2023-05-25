<?php

namespace App\Filament\Widgets;

use App\Models\Confirmation;
use App\Models\Media;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total users', User::all()->count()),
            Card::make('Total files', Media::all()->count()),
            Card::make('Total Confirmations', Confirmation::all()->count()),
        ];
    }
}
