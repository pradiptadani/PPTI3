<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\item_receipt;
use App\Models\receipt_of_item_details;
use Filament\Forms\Components\DatePicker;
class Kedatangan extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;
    public function table(Table $table): Table
    {
        $startDate = request()->input('start_date');
        $endDate = request()->input('end_date');
        return $table
            ->query(
                item_receipt::query()
                    ->join('supplier', 'items_receipt.id_supplier', '=', 'supplier.id_supplier')  // Join suppliers table
                    ->join('receipt_of_item_details', 'items_receipt.id_receipt_of_item', '=', 'receipt_of_item_details.id_receipt_of_item') // Join receipt_of_item_details
                    ->join('item', 'receipt_of_item_details.id_item', '=', 'item.id_item') // Join items table through receipt_of_item_details
                    ->select(
                        'items_receipt.*',     // Select all columns from items_receipt
                        'supplier.supplier_name',     // Select supplier_name from suppliers table
                        'receipt_of_item_details.id_item',     // Select id_item from receipt_of_item_details
                        'receipt_of_item_details.amount_of_item',     // Select quantity from receipt_of_item_details
                        'item.item_name',     // Select item_name from items table
                        // 'receipt_of_item_details.status',     // Select status from receipt_of_item_details
                    )  
                    ->when($startDate, function ($query) use ($startDate) {
                        return $query->where('receipt_date', '>=', $startDate);
                    })
                    ->when($endDate, function ($query) use ($endDate) {
                        return $query->where('receipt_date', '<=', $endDate);
                })
        )
            ->columns([
                Tables\Columns\TextColumn::make('id_receipt_of_item')->label('ID'),
                Tables\Columns\TextColumn::make('supplier_name')->label('Supplier'),
                Tables\Columns\TextColumn::make('item_name')->label('Item ID'),
                Tables\Columns\TextColumn::make('amount_of_item')->label('Quantity'),
                Tables\Columns\TextColumn::make('receipt_date')->label('Tanggal Kedatangan'),
            ])
            ->filters([
                Tables\Filters\Filter::make('date_range')
                    ->label('Date Range')
                    ->form([
                        DatePicker::make('start_date')
                        ->label('Start Date'),
                        DatePicker::make('end_date')
                        ->label('End Date'),
                    ])
                    ->query(function ($query, $data){
                        if (!empty($data['start_date'])) {
                            $query->where('receipt_date', '>=', $data['start_date']);
                        }
                        if (!empty($data['end_date'])) {
                            $query->where('receipt_date', '<=', $data['end_date']);
                        }
                    }),
                ]);
    }
}
