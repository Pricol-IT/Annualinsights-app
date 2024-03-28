<?php

namespace App\Livewire\StationaryCombustion;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class FuelsTypeChart extends ChartWidget
{
    // protected static ?string $heading = 'Chart';

    protected static string $color = 'info';

    protected function getData(): array
    {
        $sources = DB::table('stationary_combustions')
        ->select('year', 'status', 'equipment')
        ->selectRaw('SUM(total_comsumption) as total')
        ->where('status', 'approved')
        ->where('year', '2023-24')
        ->groupBy('year', 'status', 'equipment')
        ->get();
    foreach ($sources as $source) {
        $data[] = $source->total;
        $labels[] = $source->equipment;
    }
    return [
        'datasets' => [
            [
                'label' => 'Monthly wise data',
                'data' => $data,
            ],

        ],
        'labels' => $labels,


    ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
{
    return [
        'plugins' => [
            'legend' => [
                'display' => true,
            ],
        ],
        'indexAxis' => 'y'
    ];
}
}
