<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                ->label('Order ID')
                ->searchable()
                ->sortable()
                ->width(100), // Set width to keep it compact

                TextColumn::make('user.name')
                ->searchable(),

            TextColumn::make('grandTotal')
                ->money('BGN')
                ->sortable()
                ->width(120), // Adjust width to prevent overflow

            TextColumn::make('status')
                ->badge()
                ->wrap() // Ensures text doesn't overflow
                ->color(fn (string $state): string => match ($state) {
                    'new' => 'info',
                    'processing' => 'warning',
                    'shipped' => 'success',
                    'delivered' => 'success',
                    'cancelled' => 'danger',
                })
                ->icon(fn (string $state): string => match ($state) {
                    'new' => 'heroicon-m-sparkles',
                    'processing' => 'heroicon-m-arrow-path',
                    'shipped' => 'heroicon-m-truck',
                    'delivered' => 'heroicon-m-check-badge',
                    'cancelled' => 'heroicon-m-x-circle',
                })
                ->sortable()
                ->width(130), // Adjust width for better fit

            TextColumn::make('payment_method')
                ->sortable()
                ->searchable()
                ->wrap()
                ->width(120), // Prevents stretching

            TextColumn::make('payment_status')
                ->sortable()
                ->badge()
                ->searchable()
                ->wrap()
                ->width(120),

            TextColumn::make('created_at')
                ->label('Order Date')
                ->dateTime()
                ->sortable()
                ->width(140),
            ])
            ->actions([
            Action::make('View Order')
            ->url(fn (Order $record): string => OrderResource::getUrl('view', ['record'=>$record]))
            ->icon('heroicon-m-eye')
            ]);
    }
}
