1. Filament Installation : 

Laravel 10.3 => composer create-project laravel/laravel="10.3.*" (nama Project)
Migration terlebih dahulu => php artisan migrate
Filament 3 => composer require filament/filament:"^3.3" -W
Install Panel Filament => php artisan filament:install --panels
Create user pertama => php artisan make:filament-user

2. Simple Resource : 

membuat Resource tanpa relasi => php artisan make:filament-resource (nama Resource) --simple
membuat Resource Default menggunakan relasi => php artisan make:filament-resource (nama Resource)

3. Resource

Melink kan storage : php artisan storage:link

4. Translation

Membuat Kolom Index didalam list : 
TextColumn::make('index')->state(
    static function (HasTable $livewire, stdClass $rowLoop): string {
        return (string) (
            $rowLoop->iteration +
            ($livewire->getTableRecordsPerPage() * (
                $livewire->getTablePage() - 1
            ))
        );
    }
)

dengan Class => use Filament\Tables\Contracts\HasTable;

Membuat Translation (Error) : 
php artisan vendor:publish --tag=filament-panels-translations
merubah di app.php => 'locale' => 'id', mengganti nama Dashboard berada di lang id nya
