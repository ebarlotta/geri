<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Settings;
use App\Http\Controllers\ClsOtrasCosasController;
use App\Http\Livewire\Actores\ActorComponent;
use App\Http\Livewire\Beneficios\clsBeneficios;
use App\Http\Livewire\Estadosciviles\EstadosCivilesComponent;
use App\Http\Livewire\Tiposdepersonas\TiposDePersonasComponent;
use App\Http\Livewire\Tiposdedocumentos\TiposDeDocumentosComponent;
use App\Http\Livewire\Personactivo\PersonActivoComponent;
use App\Http\Livewire\Areas\AreasComponent;
use App\Http\Livewire\Empresa\EmpresaComponent;
use App\Http\Livewire\Escolaridades\EscolaridadesComponent;
use App\Http\Livewire\Estadocama\EstadocamaComponent;
use App\Http\Livewire\Gradodependencia\GradodependenciaComponent;
use App\Http\Livewire\Interfaces\InterfacesComponent;
use App\Http\Livewire\Localidades\LocalidadesComponent;
use App\Http\Livewire\Motivoegreso\MotivoegresoComponent;
use App\Http\Livewire\Nacionalidad\NacionalidadComponent;
use App\Http\Livewire\PersonaCampos\PersonasCamposComponent;
use App\Http\Livewire\Provincias\ProvinciasComponent;

// use App\Http\Livewire\Empresa\EmpresaComponent;
use App\Http\Livewire\EmpresaGestion\EmpresaGestion;
use App\Http\Livewire\EmpresaModulos\EmpresaModulosComponent;
use App\Http\Livewire\EmpresaUsuarios\EmpresaUsuariosComponent;
use App\Http\Livewire\ModuloUsuarios\ModuloUsuariosComponent;
use App\Http\Livewire\Unidad\UnidadComponent;
use App\Http\Livewire\Categorias\CategoriasComponent;
use App\Http\Livewire\Ingredientes\IngredientesComponent;
use App\Http\Livewire\Habitacion\Habitacion;
use App\Http\Livewire\Informes\InformeComponent;
use App\Http\Livewire\Medicamentos\MedicamentosComponent;
use App\Http\Livewire\Menu\MenuComponent;
use App\Http\Livewire\Personas\PersonaComponent;


//Route::get('',[HomeController::class,'index'])->name('admin.index');

Route::get('beneficios',clsBeneficios::class)->name('crudBeneficios');
Route::get('estadosciviles',EstadosCivilesComponent::class)->name('crudEstadosCiviles');
Route::get('tiposdepersonas',TiposDePersonasComponent::class)->name('crudTiposDePersonas');
Route::get('tiposdedocumentos',TiposDeDocumentosComponent::class)->name('crudTiposDeDocumentos');
Route::get('personactivo',PersonActivoComponent::class)->name('crudPersonActivo');
Route::get('areas',AreasComponent::class)->name('areas');
Route::get('escolaridades',EscolaridadesComponent::class)->name('escolaridades');
Route::get('nacionalidad',NacionalidadComponent::class)->name('nacionalidad');
Route::get('localidades',LocalidadesComponent::class)->name('localidades');
Route::get('provincias',ProvinciasComponent::class)->name('provincias');
Route::get('gradodependencia',GradodependenciaComponent::class)->name('gradodependencia');
Route::get('motivoegreso',MotivoegresoComponent::class)->name('motivoegreso');
Route::get('estadocama',EstadocamaComponent::class)->name('estadocama');
Route::get('personascampos',PersonasCamposComponent::class)->name('personascampos');
Route::get('interfaces',InterfacesComponent::class)->name('interfaces');
Route::get('medicamentos',MedicamentosComponent::class)->name('medicamentos');

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

Route::get('empresas',EmpresaComponent::class)->name('empresas');
Route::get('empresausuarios',EmpresaUsuariosComponent::class)->name('empresausuarios');
Route::get('empresamodulos',EmpresaModulosComponent::class)->name('empresamodulos');
Route::get('modulousuarios',ModuloUsuariosComponent::class)->name('modulousuarios');
Route::get('empresagestion',EmpresaGestion::class)->name('empresagestion');
Route::get('unidades',UnidadComponent::class)->name('unidades');
Route::get('categorias',CategoriasComponent::class)->name('categorias');
Route::get('ingredientes',IngredientesComponent::class)->name('ingredientes');
Route::get('habitaciones',Habitacion::class)->name('habitaciones');

Route::get('menu',MenuComponent::class)->name('menu');
// Route::get('personas',PersonaComponent::class)->name('personas');
Route::get('actores',ActorComponent::class)->name('actores');
Route::get('modalpreguntas',[ActorComponent::class,'ResponderInforme1'])->name('modalpreguntas');

Route::get('informes',InformeComponent::class)->name('informes');
// Route::get('agentegestionar',[ActorComponent::class,'show'])->name('agentegestionar');

//Route::get('menugestionar',[MenuComponent::class,'show'])->name('menugestionar');

session(['empresa_id' => 1]);  // HACER -> Hay que cargar la empresa cuando el usuario se loguee
