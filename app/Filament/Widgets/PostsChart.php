<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\LineChartWidget;
use Illuminate\Support\Carbon;

class PostsChart extends LineChartWidget
{
    protected static ?string $heading = 'Son 7 Gün Yazı Grafiği';

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $labels[] = $date->format('d.m');
            $data[] = Post::query()
                ->whereDate('created_at', $date)
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Yazı Sayısı',
                    'data' => $data,
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.2)',
                ],
            ],
            'labels' => $labels,
        ];
    }
}
