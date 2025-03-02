<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use App\Models\Order;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Layout;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [OrderStats::class];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make("All"),
            'new' =>Tab::make('New')->query(fn($query) => $query->where('status', 'new')),
            'processed' =>Tab::make('Processed')->query(fn($query) => $query->where('status', 'processed')),
            'Shipped' =>Tab::make('Shipped')->query(fn($query) => $query->where('status', 'shipped')),
            'Delivered' =>Tab::make('Delivered')->query(fn($query) => $query->where('status', 'delivered')),
            'Cancelled' =>Tab::make('Cancelled')->query(fn($query) => $query->where('status', 'cancelled')),
        ];
    }
}

