<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntityResource\Pages;
use App\Filament\Resources\EntityResource\RelationManagers;
// use App\Models\Entity;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use IFRS\Models\Entity;
use IFRS\User;


class EntityResource extends Resource
{
    protected static ?string $model = Entity::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';
    protected static ?string $navigationGroup = 'System';


    public static function form(Form $form): Form
    {
        // $user = User::find(1);
        // ddd($user->toArray());
        return $form
        ->schema([
            TextInput::make('name')
                ->label('Name')
                ->required(),

            Select::make('currency_id')
                ->label('Currency')
                ->relationship('currency', 'name'),

            Select::make('parent_id')
                ->label('Parent Entity')
                ->relationship('parent', 'name'),

            Toggle::make('multi_currency')
                ->label('Multi Currency'),

            Toggle::make('mid_year_balances')
                ->label('Mid-Year Balances'),

            TextInput::make('year_start')
                ->label('Year Start')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(12),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('currency.name')
                ->fontFamily('mono'),
                TextColumn::make('parent.name')
                ->fontFamily('mono'),
                TextColumn::make('name')
                ->fontFamily('mono'),
                TextColumn::make('mid_year_balances')
                ->fontFamily('mono'),
                TextColumn::make('multi_currency')
                ->color('primary')
                ->fontFamily('mono'),
                TextColumn::make('year_start')
                ->fontFamily('mono'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEntities::route('/'),
            'create' => Pages\CreateEntity::route('/create'),
            'edit' => Pages\EditEntity::route('/{record}/edit'),
        ];
    }
}
