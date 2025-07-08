<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Symfony\Component\HttpKernel\Profiler\Profile;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = "Student";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nis')->required()
                            ->label('NIS'),
                        TextInput::make('name')->required()->label('Nama'),
                        Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->options([
                                'Male' => 'Laki - Laki',
                                'Female' => 'Perempuan'
                            ])
                            ->required(),
                        DatePicker::make('birthday')
                            ->label('Birthday')
                            ->required(),
                        Select::make('religion')
                            ->options([
                                'Islam' => 'Islam',
                                'Katolik' => 'Katolik',
                                'Protestan' => 'Protestan',
                                'Hindu' => 'Hindu',
                                'Budha' => 'Budha',
                                'Khonghucu' => 'Khonghucu',
                            ])
                            ->label('Agama')
                            ->required(),
                        TextInput::make('contact') 
                                ->label('Nomor Kontak')
                                ->required(),
                        FileUpload::make('profile')
                                ->required()
                                ->directory('student')
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile')
                    ->label('Foto Profil'),
                TextColumn::make('nis')
                    ->label('NIS'),
                TextColumn::make('name')
                    ->label('Nama'),
                TextColumn::make('gender')
                    ->label('Jenis Kelamin'),
                TextColumn::make('contact')
                    ->label('Kontak')
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
