<?php

namespace App\Filament\Widgets;

use App\Models\CaravanRoute;
use App\Models\Post;
use App\Models\Page;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // static KALDIRILDI
    protected ?string $heading = 'Genel Bakış';

    protected function getStats(): array
    {
        return [
            Stat::make('Toplam Rota', CaravanRoute::query()->count())
                ->description('Caravan Routes')
                ->icon('heroicon-o-map'),

            Stat::make('Yayınlanan Yazı', Post::query()->count())
                ->description('Posts')
                ->icon('heroicon-o-newspaper'),

            Stat::make('Sayfa', Page::query()->count())
                ->description('Pages')
                ->icon('heroicon-o-document-text'),
        ];
    }
}
