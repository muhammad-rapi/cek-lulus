<?php

namespace App\Filament\Resources;

use App\Filament\Imports\StudentImporter;
use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Table;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nipd')
                    ->label('NIPD')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nisn')
                    ->label('NISN')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('gender')
                    ->label('Jenis Kelamin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('birth_place')
                    ->label('Tempat Lahir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->required(),
                Forms\Components\TextInput::make('parent_name')
                    ->label('Nama Orang Tua/Wali')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('village')
                    ->label('Desa/Kelurahan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('district')
                    ->label('Kecamatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('religion')
                    ->label('Agama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('rombel')
                    ->label('ROMBEL')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('file')
                    ->label('File')
                    ->directory('files')
                    ->acceptedFileTypes(['application/pdf', 'image/webp', 'image/png', 'image/jpeg', 'image/jpg'])
                    ->required(),
                Forms\Components\Toggle::make('is_graduated')
                    ->label('Lulus?')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nipd')
                    ->label('NIPD')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nisn')
                    ->label('NISN')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_place')
                    ->label('Tempat Lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent_name')
                    ->label('Nama Orang Tua/Wali')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('village')
                    ->label('Desa/Kelurahan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('district')
                    ->label('Kecamatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('religion')
                    ->label('Agama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rombel')
                    ->label('ROMBEL')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_graduated')
                    ->label('Lulus?')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
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
            ])->headerActions([
                ImportAction::make()
                    ->importer(StudentImporter::class)
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
