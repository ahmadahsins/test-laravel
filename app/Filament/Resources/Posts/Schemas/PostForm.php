<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->reactive() 
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug($state));
                    })
                    ->columnSpan('full'),

                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->required()
                    ->columnSpan('full'),

                TextInput::make('slug')
                    ->required()
                    ->reactive() 
                    ->columnSpan('full'),

                Textarea::make('body')
                    ->required()
                    ->columnSpan('full')
                    ->rows(10),
            ]);
    }
}
