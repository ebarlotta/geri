<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Settings;
use App\Http\Controllers\ClsOtrasCosasController;

use App\Http\Livewire\Beneficios\clsBeneficios;
use App\Http\Livewire\Estadosciviles\EstadosCivilesComponent;
use App\Http\Livewire\Tiposdepersonas\TiposDePersonasComponent;
use App\Http\Livewire\Tiposdedocumentos\TiposDeDocumentosComponent;
use App\Http\Livewire\Personactivo\PersonActivoComponent;


//Route::get('',[HomeController::class,'index'])->name('admin.index');

Route::get('beneficios',clsBeneficios::class)->name('crudBeneficios');
Route::get('estadosciviles',EstadosCivilesComponent::class)->name('crudEstadosCiviles');
Route::get('tiposdepersonas',TiposDePersonasComponent::class)->name('crudTiposDePersonas');
Route::get('tiposdedocumentos',TiposDeDocumentosComponent::class)->name('crudTiposDeDocumentos');
Route::get('personactivo',PersonActivoComponent::class)->name('crudPersonActivo');


Route::get('settings',[Settings::class,'index'])->name('admin.settings.index');
//Route::get('settings/beneficios',[clsBeneficios::class,'index'])->name('admin.settings.beneficios.index');
//Route::get('settings/beneficios', clsBeneficios::class);
//Route::get('settings/beneficios',[clsBeneficios::class,'index'])->name('liveware.settings.beneficios');
//Route::get('settings/beneficios',[clsBeneficios::class,'render'])->name('liveware.crudbeneficios');
Route::get('settings/beneficios',[clsBeneficios::class,'render'])->name('liveware.crudbeneficios');

Route::get('beneficios/createbeneficios',[clsBeneficios::class,'create'])->name('beneficios.create');
Route::get('prueba',clsBeneficios::class);
// Route::get('otrascosas',[ClsOtrasCosasController::class,'index'])->name('admin.otrascosas');
Route::get('otrascosas',ClsOtrasCosasController::class)->name('admin.otrascosas');
//Route::get('otrascosas',Liveotra::class)->name('admin.otrascosas');
