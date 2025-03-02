<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use App\Filament\Resources\BrandsResource\Pages;
use App\Filament\Resources\BrandsResource\RelationManagers;
use App\Filament\Resources;
use App\Models\Brands;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BrandsResource extends Resource
{
    protected static ?string $model = Brands::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => 
                    $operation === 'create' ? $set('slug', Str::slug($state)) : null
                ),
            TextInput::make('slug')
                ->disabled()
                ->dehydrated()
                ->maxLength(255)
                ->unique(Brands::class, 'slug', ignoreRecord: true),
                Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('brands') // Store images in 'storage/app/public/categories'
                ->visibility('public'), // Ensure it's publicly accessible
            
            Toggle::make('is_active')
                ->required()
                ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrands::route('/create'),
            'edit' => Pages\EditBrands::route('/{record}/edit'),
        ];
    }
}
