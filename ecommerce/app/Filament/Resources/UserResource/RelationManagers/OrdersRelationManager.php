<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

 public function table(Table $table): Table
{
    return $table
        ->recordTitleAttribute('id')
        ->columns([
            TextColumn::make('id')
                ->label('Order ID')
                ->searchable()
                ->sortable()
                ->width(100), // Set width to keep it compact

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
        ->defaultSort('created_at', 'desc') // Orders are sorted by latest first
        ->striped() // Adds alternate row colors for better readability
        ->paginated([10, 25, 50]) // Allow users to select items per page
        ->filters([ /* Add filters here if needed */ ])
        ->headerActions([ /* Keep this empty or add more actions */ ])
        ->actions([
            Action::make('View Order')
                ->url(fn (Order $record): string => OrderResource::getUrl('view', ['record' => $record]))
                ->color('info')
                ->icon('heroicon-o-eye'),

            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}
}
