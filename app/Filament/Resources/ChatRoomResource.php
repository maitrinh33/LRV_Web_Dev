<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChatRoomResource\Pages;
use App\Filament\Resources\ChatRoomResource\RelationManagers;
use App\Models\ChatRoom;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

class ChatRoomResource extends Resource
{
    protected static ?string $model = ChatRoom::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Chat Management';

    protected static ?string $navigationLabel = 'Chat Rooms';
    protected static ?string $modelLabel = 'Chat Room';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship(
                        'user',
                        'name',
                        fn (Builder $query) => $query->whereDoesntHave('chatRooms')
                    )
                    ->required()
                    ->preload()
                    ->searchable()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required()
                            ->maxLength(255),
                    ]),
                Forms\Components\TextInput::make('name')
                    ->default(fn (Forms\Get $get) => 'Chat with ' . User::find($get('user_id')?->name ?? ''))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->required(),
                Forms\Components\Livewire::make('chat-messages')
                    ->visible(fn ($record) => $record !== null)
                    ->columnSpanFull()
                    ->height('600px'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_message_at')
                    ->label('Last Message')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('messages_count')
                    ->counts('messages')
                    ->label('Messages')
                    ->sortable(),
            ])
            ->defaultSort('last_message_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('user')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->boolean(),
            ])
            ->actions([
                Action::make('view_chat')
                    ->label('View Chat')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->url(fn (ChatRoom $record): string => route('filament.admin.resources.chat-rooms.view-chat', ['record' => $record]))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListChatRooms::route('/'),
            'create' => Pages\CreateChatRoom::route('/create'),
            'view-chat' => Pages\ViewChat::route('/{record}/view-chat'),
        ];
    }
}
