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

5. Relation Manager
Menggunakan resource baru yaitu filament-resource-relation :

"php artisan make:filament-relation-manager CategoryResource posts title"

CategoryResource is the name of the resource class for the owner (parent) model.
posts is the name of the relationship you want to manage.
title is the name of the attribute that will be used to identify posts.

dan jangan lupa untuk membuat / memanggil formnya di dalam File Main Resource 

6 Theme (Tema)
Memasukkan Create Custom  Theme : php artisan make:filament-theme

Pemberitahuan : 
 WARN  Action is required to complete the theme setup:  

  ⇂ First, add a new item to the `input` array of `vite.config.js`: `resources/css/filament/admin/theme.css`  
  ⇂ Next, register the theme in the admin panel provider using `->viteTheme('resources/css/filament/admin/theme.css')`
  ⇂ Finally, run `npm run build` to compile the theme

Jika Sudah Masuk kedalam Resource->css->filament->theme.css, klik import pertama, klik index.css