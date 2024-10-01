<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\demand_for_item;
use App\Models\request_details;

class Permintaan extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                demand_for_item::query()
                    ->join('user', 'demand_for_item.id_user', '=', 'user.id_user')  // Join users table
                    ->join('request_details', 'demand_for_item.id_request_item', '=', 'request_details.id_request_item') // Join request_details
                    ->join('item', 'request_details.id_item', '=', 'item.id_item') // Join items table through request_details
                    ->select(
                        'demand_for_item.*',     // Select all columns from demand_for_item
                        'user.name',     // Select username from users table
                        'request_details.id_item',     // Select id_item from request_details
                        'request_details.number_of_request',     // Select quantity from request_details
                        'item.item_name',     // Select item_name from items table
                        // 'request_details.status',     // Select status from request_details
                    )
            )
            ->columns([
                Tables\Columns\TextColumn::make('id_request_item')->label('ID'),
                Tables\Columns\TextColumn::make('name')->label('User'),
                Tables\Columns\TextColumn::make('item_name')->label('Item ID'),
                Tables\Columns\TextColumn::make('number_of_request')->label('Quantity'),
                Tables\Columns\TextColumn::make('application_status')->label('Status'),
                Tables\Columns\TextColumn::make('request_date')->label('Tanggal Pengajuan'),
            ]);
    }
}
