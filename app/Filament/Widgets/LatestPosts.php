<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class LatestPosts extends BaseWidget
{
    protected static ?string $heading = 'Son Yazılar';

    protected function getTableQuery(): Builder|Relation|null
    {
        return Post::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->label('Başlık')
                ->searchable()
                ->limit(40),

            Tables\Columns\TextColumn::make('category.name')
                ->label('Kategori')
                ->badge(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Oluşturma')
                ->dateTime('d.m.Y H:i'),

            Tables\Columns\IconColumn::make('is_published')
                ->boolean()
                ->label('Yayın'),
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
