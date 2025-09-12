<?php

namespace App\Filament\Widgets;

use App\Models\CaravanRoute;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class LatestRoutes extends BaseWidget
{
    protected static ?string $heading = 'Son Eklenen Rotalar';

    protected function getTableQuery(): Builder|Relation|null
    {
        return CaravanRoute::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->label('Rota')
                ->searchable()
                ->limit(40),

            Tables\Columns\TextColumn::make('difficulty')
                ->label('Zorluk')
                ->badge(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Tarih')
                ->date('d.m.Y'),
        ];
    }

    public function getDefaultTableRecordsPerPageSelectOption(): int
    {
        return 10;
    }

    public function getTableRecordsPerPageSelectOptions(): array
    {
        return [10, 25, 50];
    }
}

