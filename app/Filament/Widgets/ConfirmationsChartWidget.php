<?php

namespace App\Filament\Widgets;

use App\Models\Confirmation;
use Filament\Widgets\DoughnutChartWidget;
use Filament\Widgets\PieChartWidget;

class ConfirmationsChartWidget extends DoughnutChartWidget
{
    protected static ?string $heading = 'All Confirmations Statuses';
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $confirmed = Confirmation::query()->whereNotNull('confirmed_at')->count();
        $nonConfirmed = Confirmation::query()->whereNull('confirmed_at')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Confirmations',
                    'data' => [$confirmed, $nonConfirmed],
                    'backgroundColor' => [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                    ],
                ],
            ],
            'labels' => ['Confirmed: '.$confirmed, 'Non confirmed: '.$nonConfirmed],
        ];
    }
}
