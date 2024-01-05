<?php

namespace App\Http\Livewire\Actores;

use Illuminate\Support\Facades\DB;
use App\Models\Actor;
use App\Models\Actores\ActorAgente;
use App\Models\Actores\ActorCliente;
use App\Models\Actores\ActorEmpresa;
use App\Models\Actores\ActorPersonal;
use App\Models\Actores\ActorProveedor;
use App\Models\Actores\ActorReferente;
use App\Models\Actores\ActorVendedor;
use App\Models\AgenteInforme;
use App\Models\Areas;
use App\Models\Beneficios;
use App\Models\Camas;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Escolaridades;
use App\Models\EstadosCiviles;
use App\Models\GradoDependencia;
use App\Models\Habitacion;
use App\Models\Informes\Informe;
use App\Models\Informes\InformeRespuestas;
use App\Models\Iva;
use App\Models\Localidades;
use App\Models\Nacionalidad;
use Livewire\Component;
use App\Models\PersonActivo;
use App\Models\Personas;
use App\Models\Pregunta;
use App\Models\Referente;
use App\Models\Sexo;
use App\Models\Sociales\DatosSocial;
use App\Models\TipoDePersona;
use App\Models\TiposDocumentos;

class ActorComponent extends Component
{
    public $persona_descripcion, $actor_id, $iva_id, $fingreso, $fegreso, $peso, $referente_id;
    public $actores, $ivas, $referentes;
    
    public $tipos_documentos, $estados_civiles, $tipos_de_personas, $nacionalidades, $localidades, $beneficios, $grados_dependencias, $escolaridades, $camas, $person_activos, $sexos, $datossociales_id, $historiadevida;

    public $camas22;
    public $radios;

    public $name, $alias, $documento, $nacimiento, $email, $domicilio, $tipodocumento_id, $estadocivil_id, $nacionalidad_id, $localidad_id, $beneficio_id, $gradodependencia_id, $cama_id, $escolaridad_id, $sexo_id, $tipopersona_id, $personactivo_id, $email_verified_at, $iminimo, $cbu, $nrotramite, $patente, $nrocta,
    $actor_referente, $actividad, $caracterdeltitular;

    public $listadoinformes,$listadoinformesGenerados,$respuestas,$nombredelinforme;

    public $isModalOpen = false;
    public $isModalOpenAdicionales=false;
    public $isModalOpenGestionar=false;
    public $mostrarInformesGenerados =false;
    public $mostrarinformeespecifico=false, $informeespecifico;

    public $vinculo, $modalidad,$ultimaocupacion,$viviendapropia,$canthijosvarones,$canthijasmujeres, $activo;


    public function render()
    {
        $this->tipos_documentos = TiposDocumentos::all();
        $this->estados_civiles = EstadosCiviles::all();
        $this->tipos_de_personas = TipoDePersona::all();
        $this->nacionalidades = Nacionalidad::all();
        $this->localidades = Localidades::all();
        $this->beneficios = Beneficios::all();
        $this->grados_dependencias = GradoDependencia::all();
        $this->escolaridades = Escolaridades::all();
        $this->sexos = Sexo::all();
        $this->person_activos = PersonActivo::all();
        $this->ivas = Iva::all();
        // $this->actores = Empresa::all();
        // $this->actores = Actor::all();
        $this->camas = json_decode(DB::table('cama_habitacions')
            ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
            ->where('habitacions.empresa_id',session('empresa_id'))
            ->orderBy('cama_id')
            ->get(),true);
        // $this->radios = 'Todos';
        if(is_null($this->radios)) { $this->radios='Todos'; $this->actores = Actor::orderby('nombre')->get(); }
            // dd($this->radios);
        return view('livewire.actores.actor-component')->with(['radios'=>$this->radios]);
    }

    public function show($id) {
        $actor = Actor::find($id);
        $this->CargaDatosdelActor($actor);
        $agente = ActorAgente::where('id','=',$this->actor_id)->get(); 
        $this->CargaDatosdelAgente($agente); 

        $this->isModalOpenGestionar=!$this->isModalOpenGestionar;
        // dd('mount');
        // return view('livewire.actores.createactores2');
    }

    public function CargarInforme($informe) {
        switch ($informe) {
            case 'Sociales':{ 
                // $this->listadoinformes = Informe::join('areas','areas.id','informes.area_id')
                $this->listadoinformes = Areas::join('informes','areas.id','informes.area_id')
                ->where('areasdescripcion','=','Social')
                ->get();  break;
            }
        }
    }

    public function MostrarInformes($informe_id) {
        $this->mostrarInformesGenerados = true;
        // $this->listadoinformesGenerados = AgenteInforme::all();
        // dd($this->listadoinformesGenerados);
        $this->listadoinformesGenerados = AgenteInforme::where('informe_id','=',$informe_id)->orderby('anio')->orderby('nroperiodo')->get();
    }

    public function BuscarDatosDelInforme($informe_id) {

        // $this->respuestas = InformeRespuestas::find($informe_id);
        // $this->respuestas = InformeRespuestas::where('agente_informes_id','=',$informe_id)->get();
        $this->informeespecifico = InformeRespuestas::join('preguntas','preguntas.id','preguntas_id')
        // ->join('escalas','escalas.id','escalas_id')
        ->where('agente_informes_id','=',$informe_id)->get();
        // $cont = 0;
        // dd($this->informeespecifico[0]->informe_id);

        $this->nombredelinforme = Informe::find($this->informeespecifico[0]->informe_id)->nombreinforme;
        // dd($this->nombredelinforme);

        // foreach($this->respuestas as $respuesta) {
            // $a[$cont]['cantidad'] = $respuesta->cantidad;
            // $this->informeespecifico = Pregunta::find($respuesta->preguntas_id)->get();
            // dd($a[$cont]);
            // $cont++;
        // }
        $this->mostrarinformeespecifico = true;
        // dd($a);
        // dd($this->respuestas->respuesta);
    }

    public function Filtrar() {
        switch ($this->radios) {
            case 'Todos': $this->actores = Actor::orderby('nombre')->get(); break;
            case 'Agentes': $this->actores = Actor::where('tipopersona_id','=',1)->orderby('nombre')->get(); break;
            case 'Referentes': $this->actores = Actor::where('tipopersona_id','=',2)->orderby('nombre')->get(); break;
            case 'Personal': $this->actores = Actor::where('tipopersona_id','=',3)->orderby('nombre')->get(); break;
            case 'Proveedores': $this->actores = Actor::where('tipopersona_id','=',4)->orderby('nombre')->get(); break;
            case 'Clientes': $this->actores = Actor::where('tipopersona_id','=',5)->orderby('nombre')->get(); break;
            case 'Vendedores': $this->actores = Actor::where('tipopersona_id','=',6)->orderby('nombre')->get(); break;
            case 'Empresas': $this->actores = Actor::where('tipopersona_id','=',7)->orderby('nombre')->get(); break;
        }
    }
    //     // $this->render();
    // }

    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        $this->tipos_documentos = TiposDocumentos::all();
        $this->estados_civiles = EstadosCiviles::all();
        $this->tipos_de_personas = TipoDePersona::all();
        $this->nacionalidades = Nacionalidad::all();
        $this->localidades = Localidades::all();
        $this->beneficios = Beneficios::all();
        $this->grados_dependencias = GradoDependencia::all();
        $this->escolaridades = Escolaridades::all();
        $this->person_activos = PersonActivo::all();
        $this->camas = json_decode(DB::table('cama_habitacions')
            ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
            ->where('habitacions.empresa_id',session('empresa_id'))
            ->orderBy('cama_id')
            ->get(),true);
        return view('livewire.actores.actor-component')->with('isModalOpen', $this->isModalOpen);
    }

    // Se encarga de los modales 
    //==========================
    public function openModalPopover() { $this->isModalOpen = true; }
    public function closeModalPopover() { $this->isModalOpen = false; }
    public function closeModalInformeEspecifico() { $this->mostrarinformeespecifico = false; }
    public function openModalPopoverAdicionales() { $this->isModalOpenAdicionales = true; }
    public function closeModalPopoverAdicionales() { 
        $this->isModalOpenAdicionales = false; 
        $this->reset('vinculo','ultimaocupacion','viviendapropia','canthijosvarones','canthijasmujeres','activo');
    }

    private function resetCreateForm(){
        $this->actor_id = '';
        $this->email = '';
        $this->domicilio = '';
        $this->documento = '';
        $this->tipopersona_id = null ;
        $this->nacionalidad_id = null;
        $this->localidad_id = null ;
        $this->beneficio_id = null ;
        $this->personactivo_id = null ;

    }
    
    public function store()
    {
        
        $this->validate([
            'name' => 'required', 
            'documento' => 'required|integer',
            'tipodocumento_id' => 'required|integer', 
            // 'nacimiento' => 'required|date',
            // 'estadocivil_id' => 'required|integer',
            // 'sexo_id' => 'required|integer', 
            // 'email' => 'required|email', 
            'tipopersona_id' => 'required|integer', 
            'nacionalidad_id' => 'required|integer',
            'localidad_id' => 'required|integer',
            'beneficio_id' => 'required|integer',
            // 'gradodependencia_id' => 'required|integer', 
            // 'escolaridad_id' => 'required|integer', 
            // 'cama_id' => 'integer', 
            'personactivo_id' => 'required|integer',
        ]);
        //dd($this->personactivo_id);
        actor::updateOrCreate(['id' => $this->actor_id], [
            'nombre' => $this->name, 
            // 'alias' => $this->alias, 
            'domicilio' => $this->domicilio, 
            'documento' =>  $this->documento,
            'tipos_documento' =>  1, //$this->tipodocumento_id, 
            'nacimiento' =>  date(now()), //$this->nacimiento,
            // 'estadocivil_id' =>  $this->estadocivil_id,
            'sexo_id' =>  1, //$this->sexo_id, 
            'email' =>  $this->email, 
            'telefono' => 1111, // $this->telefono, 
            // 'tipopersona_id' =>  $this->tipopersona_id, 
            'nacionalidad_id' =>  $this->nacionalidad_id,
            'localidad_id' =>  $this->localidad_id,
            // 'beneficio_id' =>  $this->beneficio_id,
            'obrasocial_id' =>  $this->beneficio_id,
            // 'gradodependencia_id' =>  $this->gradodependencia_id, 
            'escolaridad_id' =>  1, //$this->escolaridad_id, 
            // 'cama_id' =>  $this->cama_id, 
            'personactivo_id' =>  $this->personactivo_id,
            // 'email_verified_at' => $this->nacimiento,
            'tipopersona_id' => $this->tipopersona_id,
            'empresa_id' => 1,
            'urlfoto' => 'pepe',
            'activo' => 1,
        ]);
        session()->flash('message', $this->actor_id ? 'Actor Actualizada.' : 'Actor Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $actor = Actor::findOrFail($id);
        $this->id = $id;
        $this->actor_id=$id;
        //$cliente = new empresa;
        //dd($cliente->nombre);
        $this->name = $actor->nombre;
        // $this->alias = $actor->alias;
        $this->domicilio = $actor->domicilio;
        $this->documento = $actor->documento;
        $this->tipodocumento_id = $actor->tipos_documento;
        //$this->tipodocumento_id = $actor->tipodocumento_id;
        $this->nacimiento = $actor->nacimiento;
        $this->estadocivil_id = $actor->estadocivil_id;
        // $this->sexo_id = $actor->sexo_id ;
        $this->email = $actor->email;
        $this->tipopersona_id = $actor->tipopersona_id;
        $this->nacionalidad_id = $actor->nacionalidad_id;
        $this->localidad_id = $actor->localidad_id;
        $this->beneficio_id = $actor->obrasocial_id;
        // $this->gradodependencia_id = $actor->gradodependencia_id ;
        $this->escolaridad_id = $actor->escolaridad_id ;
        // $this->cama_id = $actor->cama_id ;
        // $this->email_verified_at = $actor->email_verified_at;

        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Actor::find($id)->delete();
        session()->flash('message', 'Actor Eliminada.');
    }

    public function agregar($id)
    {
        $actor = Actor::findOrFail($id);
        $this->id = $id;
        $this->actor_id=$id;
        
        //$cliente = new empresa;
        // dd($actor->tipopersona_id);
        switch ($actor->tipopersona_id) {
            case 1: {
                $this->referentes = Actor::where('tipopersona_id','=',2)->get(); 
                $agente = ActorAgente::where('id','=',$this->actor_id)->get(); 
                $this->CargaDatosdelAgente($agente);                
                break; // Agente
            }
            case 2: {
                // Referentes
                    $referente = ActorReferente::where('actor_id','=',$this->actor_id)->get();
                    if($referente->isNotEmpty()) {
                        $this->vinculo = $referente[0]->vinculo;
                        $this->ultimaocupacion = $referente[0]->ultimaocupacion;
                        $this->viviendapropia = $referente[0]->viviendapropia;
                        $this->canthijosvarones = $referente[0]->canthijosvarones;
                        $this->canthijasmujeres = $referente[0]->canthijasmujeres;
                        $this->actor_id = $referente[0]->actor_id;
                        $this->activo = $referente[0]->activo;
                    }
                    break;
                }
            case 3: // Personal
                $personal = ActorPersonal::where('actor_id','=',$this->actor_id)->get();
                if($personal->isNotEmpty()) {
                    $this->modalidad = $personal[0]->modalidad;
                    $this->fingreso = $personal[0]->fingreso;
                    $this->iminimo = $personal[0]->iminimo;
                    $this->cbu = $personal[0]->cbu;
                    $this->nrotramite = $personal[0]->nrotramite;
                    $this->patente = $personal[0]->patente;
                    $this->nrocta = $personal[0]->nrocta;
                    $this->activo = $personal[0]->activo;
                }
                break;
                case 4: //Proveedor
                    // dd($this->actor_id);
                $proveedor = ActorProveedor::where('actor_id','=',$this->actor_id)->get();
                if($proveedor->isNotEmpty()) {
                    $this->iva_id = $proveedor[0]->iva_id;
                }
                break;
                case 5: //Cliente
                    // dd($this->actor_id);
                $cliente = ActorCliente::where('actor_id','=',$this->actor_id)->get();
                if($cliente->isNotEmpty()) {
                    $this->iva_id = $cliente[0]->iva_id;
                }
                break;
                case 6: // Vendedor
                    $vendedor = ActorVendedor::where('actor_id','=',$this->actor_id)->get();
                if($vendedor->isNotEmpty()) {
                    $this->iva_id = $vendedor[0]->iva_id;
                }
                    break;
                case 7: // Empresa
                    $empresa = ActorEmpresa::where('actor_id','=',$this->actor_id)->get();
                if($empresa->isNotEmpty()) {
                    $this->iva_id = $empresa[0]->iva_id;
                    $this->caracterdeltitular = $empresa[0]->caracterdeltitular;
                    $this->actividad = $empresa[0]->actividad;
                }
                    break;
            }

        // Carga Datos del Actor
        $this->CargaDatosdelActor($actor);
        $this->openModalPopoverAdicionales();
    }

        
    public function CargaDatosdelActor($actor) {
        $this->actor_id = $actor->id;
        $this->name = $actor->nombre;
        $this->domicilio = $actor->domicilio;
        $this->documento = $actor->documento;
        $this->tipodocumento_id = $actor->tipodocumento_id;
        //$this->tipodocumento_id = $actor->tipodocumento_id;
        $this->nacimiento = $actor->nacimiento;
        $this->estadocivil_id = $actor->estadocivil_id;
        $this->sexo_id = $actor->sexo_id;
        $this->email = $actor->email;
        $this->tipopersona_id = $actor->tipopersona_id;
        $this->nacionalidad_id = $actor->nacionalidad_id;
        $this->localidad_id = $actor->localidad_id;
        $this->beneficio_id = $actor->beneficio_id;
        $this->escolaridad_id = $actor->escolaridad_id ;
        //$this->cama_id = $actor->cama_id;
        $this->personactivo_id = $actor->personactivo_id;
        $this->email_verified_at = $actor->email_verified_at;
    }

    public function CargaDatosdelAgente($agente) {
        // Datos del Agente
        if($agente->isNotEmpty()) {
            $this->fingreso = $agente[0]->fingreso;
            $this->fegreso = $agente[0]->fegreso;
            $this->peso = $agente[0]->peso_id;
            $this->cama_id = $agente[0]->cama_id;
            $this->alias = $agente[0]->alias;
            $this->gradodependencia_id = $agente[0]->gradodependencia_id;
            $this->actor_referente = $agente[0]->actor_referente;
            $this->referentes = Actor::where('tipopersona_id','=',2)->get();
            // $this->camas = json_decode(DB::table('cama_habitacions')
            // ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
            // ->where('habitacions.empresa_id',session('empresa_id'))
            // ->orderBy('cama_id')
            // ->get(),true);
            $this->camas22 = Camas::where('EstadoCama','=',1)->orderby('NroHabitacion')->get();           
            $this->datossociales_id = $agente[0]->datossociales_id;

            if(!is_null($agente[0]->datossociales_id)) {
                $this->historiadevida = DatosSocial::findOrFail($agente[0]->datossociales_id)->historiadevida;
            } 
            // dd($this->historiadevida);
        }        
    }

    public function storeAdicionalActor() {
        switch ($this->tipopersona_id) {
            case 1: // Agente
                $this->validate([
                    'fingreso' => 'required',
                    'peso' => 'integer',
                    'referente_id' => 'integer',
                    'cama_id' => 'integer',
                ]);
                $a = ActorAgente::updateOrCreate(['id' => $this->actor_id], [
                'fingreso' => $this->fingreso,
                'fegreso' => $this->fegreso,
                'alias' => $this->alias,
                'peso_id' => $this->peso,
                'actor_referente' => $this->referente_id,
                'cama_id' => $this->cama_id,
                'datossociales_id' => null,
                'datosmedicos_id' => null,
                'motivos_egreso_id' => null,
                'grado_dependencia_id' => null,
                'historiadevida_id' => null,
                'informes_id' => null,
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break;
            case 2: // Referente
                
            $this->validate([
                'vinculo' => 'required',
                // 'modalidad' => 'required', 
                'ultimaocupacion' => 'required', 
                'viviendapropia' => 'required', 
                'canthijosvarones' => 'required', 
                'canthijasmujeres' => 'required', 
                'activo' => 'required', 
            ]);
            // dd($this->actor_id);
            $a = ActorReferente::updateOrCreate(['actor_id' => $this->actor_id], [ //Tener en cuenta que está grabando en la tabla de personas, no de agentes
                'vinculo' => $this->vinculo, 
                'modalidad' => 1, 
                'ultimaocupacion' => $this->ultimaocupacion, 
                'viviendapropia' => $this->viviendapropia, 
                'canthijosvarones' => $this->canthijosvarones, 
                'canthijasmujeres' => $this->canthijasmujeres, 
                'actor_id' => $this->actor_id, 
                'activo' => $this->activo, 
            ]);
            session()->flash('message', 'Se guardaron los datos');
            break;
            case 3: // Personal
                $this->validate([
                    'modalidad' => 'required',
                    'fingreso' => 'required|date', 
                    'iminimo' => 'integer', 
                    'activo' => 'required', 
                ]);
                // DD($this->actor_id);
                $a = ActorPersonal::updateOrCreate(['actor_id' => $this->actor_id], [
                    'modalidad' => $this->modalidad,  
                    'fingreso' => $this->fingreso, 
                    'iminimo' => $this->iminimo, 
                    'cbu' => $this->cbu, 
                    'nrotramite' => $this->nrotramite, 
                    'patente' => $this->patente, 
                    'nrocta' => $this->nrocta,
                    'actor_id' => $this->actor_id, 
                    'activo' => $this->activo, 
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break; 
            case 4:  // Proveedor
                $this->validate([
                    'iva_id' => 'integer',
                ]);
                $a = ActorProveedor::updateOrCreate(['actor_id' => $this->actor_id], [
                    'iva_id' => $this->iva_id,
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break;
            case 5: // Cliente
                $this->validate([
                    'iva_id' => 'integer',
                ]);
                $a = ActorCliente::updateOrCreate(['actor_id' => $this->actor_id], [
                    'iva_id' => $this->iva_id,
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break;
            case 6: // Vendedor
                $this->validate([
                    'iva_id' => 'integer',
                ]);
                $a = ActorVendedor::updateOrCreate(['actor_id' => $this->actor_id], [
                    'iva_id' => $this->iva_id,
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break;
            case 7: // Empresa
                $this->validate([
                    'iva_id' => 'integer',
                ]);
                $a = ActorEmpresa::updateOrCreate(['actor_id' => $this->actor_id], [
                    'iva_id' => $this->iva_id,
                    'actividad' => $this->actividad,
                    'caracterdeltitular' => $this->caracterdeltitular,
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break;
        }

    }
}
