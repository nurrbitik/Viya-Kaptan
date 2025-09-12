<?php

namespace App\Filament\Resources\CaravanRouteResource\Pages;

use App\Filament\Resources\CaravanRouteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCaravanRoutes extends ListRecords
{
    protected static string $resource = CaravanRouteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
