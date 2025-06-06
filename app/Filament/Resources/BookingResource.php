<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                forms\Components\Select::make('status')
                ->label('Status Booking')
                ->options([
                    'pending'=>'Pending',
                    'confirm'=>'Confirm', 
                    'cancelled'=>'Cancelled'
                ])
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                tables\Columns\TextColumn::make('user.name')->label('Nama Pengguna'),
                tables\Columns\TextColumn::make('schedule.trip.name')->label('Nama Trip'),
                tables\Columns\TextColumn::make('schedule.departure_date')->label('Tanggal Keberangkatan')->date(),
                tables\Columns\TextColumn::make('total_price')->label('Total Harga')->money('IDR', locale: 'id'),
                tables\Columns\BadgeColumn::make('status')->label('Status')->colors([
                    'pending' => 'warning',
                    'confirmed' => 'success',
                    'cancelled' => 'danger',
                ]),
                tables\Columns\TextColumn::make('created_at')->label('Tanggal Booking')->dateTime(),
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
            'index' => Pages\ListBookings::route('/'),
            // 'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

}
