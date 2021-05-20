<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Settings;
use App\Http\Livewire\clsBeneficios;

Route::get('',[HomeController::class,'index'])->name('admin.index');
Route::get('settings',[Settings::class,'index'])->name('admin.settings.index');
//Route::get('settings/beneficios',[clsBeneficios::class,'index'])->name('admin.settings.beneficios.index');
Route::get('settings/beneficios', clsBeneficios::class);
//Route::get('settings/beneficios',[clsBeneficios::class,'index'])->name('liveware.settings.beneficios');
Route::get('prueba',clsBeneficios::class);

