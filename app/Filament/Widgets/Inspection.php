<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\return_details;
use App\Models\return_of_item;


class Inspection extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                return_details::query()
                    ->join('return_of_item', 'return_details.id_return_item', '=', 'return_of_item.id_return_item')  // Join return_of_item table
                    // ->join('item', 'return_details.id_item', '=', 'item.id_item') // Join items table through return_details
                    ->select(
                        'return_details.*',     // Select all columns from return_details
                        'return_of_item.return_date',     // Select return_date from return_of_item
                        // 'item.item_name',     // Select item_name from items table
                        'return_details.number_of_items_returned'     // Select qty from return_details
                    )
            )
            ->columns([
                Tables\Columns\TextColumn::make('id_supplier')->label('ID Supplier'),
                Tables\Columns\TextColumn::make('return_date')->label('Return Date'),
                Tables\Columns\TextColumn::make('id_return_item')->label('Item ID'),
                Tables\Columns\TextColumn::make('number_of_items_returned')->label('Qty'),
                // Tables\Columns\TextColumn::make('created_at')->label('Created At')
            ]);
    }
}
