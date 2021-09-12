<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagescontroller;

Route::get('/', [pagescontroller::class, 'home'])->name('landing');
Route::get('/import/data', [pagescontroller::class, 'import_csv'])->name('import');
Route::post('/import/csv_file', [pagescontroller::class, 'import_data'])->name('import_data');
Route::get('/test', [pagescontroller::class, 'display_characters']);
