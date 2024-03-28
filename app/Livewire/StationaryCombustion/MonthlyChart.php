<?php

namespace App\Livewire\StationaryCombustion;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MonthlyChart extends ChartWidget
{
    // protected static ?string $heading = 'Chart';

    protected static string $color = 'info';

    protected function getData(): array
    {
        $sources = DB::table('stationary_combustions')
            ->select('year', 'status', 'month')
            ->selectRaw('SUM(total_comsumption) as total')
            ->orderBy(DB::raw('CAST(month AS UNSIGNED)'), 'asc')
            ->where('status', 'approved')
            ->where('year', '2023-24')
            ->groupBy('year', 'status', 'month')
            ->get();
        foreach ($sources as $source) {
            $data[] = $source->total;
            $labels[] = $source->month;
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
}
