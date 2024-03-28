<?php

namespace App\Livewire\StationaryCombustion;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class YearlyChart extends ChartWidget
{
    // protected static ?string $heading = 'Chart';

    protected static string $color = 'info';

    protected function getData(): array
    {
        $sources = DB::table('stationary_combustions')
            ->select('year', 'status')
            ->selectRaw('SUM(total_comsumption) as total')
            ->orderBy('year', 'asc')
            ->where('status', 'approved')
            ->groupBy('year', 'status')
            ->get();
        foreach ($sources as $source) {
            $data[] = $source->total;
            $labels[] = $source->year;
        }

        // return [$sources];
        return [
            'datasets' => [
                [
                    'label' => 'Last three years data',
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
}
