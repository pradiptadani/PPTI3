<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;


class Items extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Item::query()
            )
            ->columns([
                TextColumn::make('id_item')->label('ID'),
                TextColumn::make('item_name')->label('Item Name'),
                TextColumn::make('specification')->label('Specification'),
                TextColumn::make('category')->label('Category'),
                TextColumn::make('unit')->label('Unit'),
                TextColumn::make('price')->label('Price'),
                TextColumn::make('quantity')->label('Stock'),
                TextColumn::make('updated_at')->label('Last Updated'),
            ]);
    }
}
