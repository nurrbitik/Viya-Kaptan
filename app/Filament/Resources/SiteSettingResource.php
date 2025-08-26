<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\KeyValue;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Ayarlar';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('site_name')->label('Site adı')->required(),
            TextInput::make('hero_title')->label('Hero başlık'),
            TextInput::make('hero_subtitle')->label('Hero alt başlık'),
            KeyValue::make('hero_buttons')->label('Hero butonları (label/url)')
                ->keyLabel('label')->valueLabel('url')->addButtonLabel('Ekle')->reorderable(),

            TextInput::make('stats_posts')->numeric()->minValue(0),
            TextInput::make('stats_routes')->numeric()->minValue(0),
            TextInput::make('stats_followers')->numeric()->minValue(0),

            TextInput::make('email')->email(),
            Textarea::make('address')->rows(3),
            KeyValue::make('socials')->label('Sosyal bağlantılar (ad/url)')
                ->keyLabel('ad')->valueLabel('url')->addButtonLabel('Ekle')->reorderable(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('site_name')->sortable()->searchable(),
            TextColumn::make('updated_at')->dateTime('Y-m-d H:i')->sortable(),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit'   => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}
