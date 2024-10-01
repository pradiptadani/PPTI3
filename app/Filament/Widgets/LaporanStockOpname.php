<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\stock_opname;
use App\Models\detail_stock_opname;

class LaporanStockOpname extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                stock_opname::query()
                    ->join('user', 'stock_opname.id_user', '=', 'user.id_user')  // Join users table
                    ->join('detail_stock_opname', 'stock_opname.idStock_Opname', '=', 'detail_stock_opname.idStock_Opname') // Join detail_stock_opname
                    ->join('item', 'detail_stock_opname.id_item', '=', 'item.id_item') // Join items table through detail_stock_opname
                    ->select(
                        'stock_opname.*',     // Select all columns from stock_opname
                        'user.name',     // Select username from users table
                        'item.item_name',     // Select item_name from items table
                        'detail_stock_opname.stock_akhir'     // Select stock_akhir from detail_stock_opname
                    )
            )
            ->columns([
                Tables\Columns\TextColumn::make('idStock_Opname')->label('ID'),
                Tables\Columns\TextColumn::make('name')->label('User'),
                Tables\Columns\TextColumn::make('item_name')->label('Item Name'),
                Tables\Columns\TextColumn::make('stock_akhir')->label('Stock Akhir'),
                Tables\Columns\TextColumn::make('report_date')->label('Report Date')
            ]);
    }
}
