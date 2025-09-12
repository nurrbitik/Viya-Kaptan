<?php


namespace App\Filament\Resources;

use App\Filament\Resources\CaravanRouteResource\Pages;
use App\Models\CaravanRoute;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class CaravanRouteResource extends Resource
{
    protected static ?string $model = CaravanRoute::class;
    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),
            TextInput::make('slug')->required()->unique(ignoreRecord: true),

            TextInput::make('distance_km')->numeric()->minValue(0),
            TextInput::make('days')->numeric()->minValue(1)->maxValue(60),

            Textarea::make('excerpt')->rows(3)->columnSpanFull(),
            Forms\Components\RichEditor::make('content')->columnSpanFull(),

            FileUpload::make('cover')->image()->directory('routes'),

            Toggle::make('is_published'),
            DateTimePicker::make('published_at'),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title')->searchable()->sortable(),
            TextColumn::make('days')->label('Days')->sortable(),
            TextColumn::make('distance_km')->label('Distance (km)')->sortable(),
            IconColumn::make('is_published')->boolean(),
            TextColumn::make('published_at')->dateTime('Y-m-d H:i')->sortable(),
            TextColumn::make('updated_at')->dateTime('Y-m-d H:i')->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCaravanRoutes::route('/'),
            'create' => Pages\CreateCaravanRoute::route('/create'),
            'edit' => Pages\EditCaravanRoute::route('/{record}/edit'),
        ];
    }
}
