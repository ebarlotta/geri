<?php

namespace App\Http\Livewire\Actores;

use Illuminate\Support\Facades\DB;
use App\Models\Actor;
use App\Models\Actores\ActorReferente;
use App\Models\Beneficios;
use App\Models\Camas;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Escolaridades;
use App\Models\EstadosCiviles;
use App\Models\GradoDependencia;
use App\Models\Habitacion;
use App\Models\Iva;
use App\Models\Localidades;
use App\Models\Nacionalidad;
use Livewire\Component;
use App\Models\PersonActivo;
use App\Models\Personas;
use App\Models\Referente;
use App\Models\Sexo;
use App\Models\TipoDePersona;
use App\Models\TiposDocumentos;

class ActorComponent extends Component
{
    public $persona_descripcion, $actor_id, $iva_id, $fingreso, $fegreso, $peso, $referente_id;
    public $actores, $ivas, $referentes;
    
    public $tipos_documentos, $estados_civiles, $tipos_de_personas, $nacionalidades, $localidades, $beneficios, $grados_dependencias, $escolaridades, $camas, $person_activos, $sexos;

    public $camas22;

    public $name, $alias, $documento, $nacimiento, $email, $domicilio, $tipodocumento_id, $estadocivil_id, $nacionalidad_id, $localidad_id, $beneficio_id, $gradodependencia_id, $cama_id, $escolaridad_id, $sexo_id, $tipopersona_id, $estado_id, $email_verified_at;

    public $isModalOpen = false;
    public $isModalOpenAdicionales=false;
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
        $this->actores = Actor::all();

        //dd($this->actores);
        $this->camas = json_decode(DB::table('cama_habitacions')
            ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
            ->where('habitacions.empresa_id',session('empresa_id'))
            ->orderBy('cama_id')
            ->get(),true);

        return view('livewire.actores.actor-component');
    }

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
    public function openModalPopoverAdicionales() { $this->isModalOpenAdicionales = true; }
    public function closeModalPopoverAdicionales() { 
        $this->isModalOpenAdicionales = false; 
        $this->reset('vinculo','ultimaocupacion','viviendapropia','canthijosvarones','canthijasmujeres','activo');
    }
    

    private function resetCreateForm(){
        $this->actor_id = '';
        $this->actor_descripcion = '';
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
            'estado_id' => 'required|integer',
        ]);
        // dd($this->tipopersona_id);
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
            // 'estado_id' =>  $this->estado_id,
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
        // $this->estado_id = $actor->estado_id;
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
        switch ($this->tipopersona_id) {
            case 1: break; // Agente
            case 2: // Referentes
                    $referente = ActorReferente::where('actor_id','=',$this->actor_id)->get();
                    if($referente->isNotEmpty()) {
                        $this->vinculo = $referente[0]->vinculo;
                        $this->ultimaocupacion = $referente[0]->ultimaocupacion;
                        $this->viviendapropia = $referente[0]->viviendapropia;
                        $this->canthijosvarones = $referente[0]->canthijosvarones;
                        $this->canthijasmujeres = $referente[0]->canthijasmujeres;
                        $this->actor_id = $referente[0]->actor_id;
                        $this->activo = $referente[0]->activo;
                        break;
                    }
        }

        $this->name = $actor->name;
        $this->alias = $actor->alias;
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
        $this->gradodependencia_id = $actor->gradodependencia_id ;
        $this->escolaridad_id = $actor->escolaridad_id ;
        $this->cama_id = $actor->cama_id ;
        $this->estado_id = $actor->estado_id;
        $this->email_verified_at = $actor->email_verified_at;
        // dd($this->actor_id);
        $this->referentes = Actor::where('tipopersona_id','=',2)->get();

        // $this->camas = json_decode(DB::table('cama_habitacions')
        // ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
        // ->where('habitacions.empresa_id',session('empresa_id'))
        // ->orderBy('cama_id')
        // ->get(),true);
        $this->camas22 = Camas::where('EstadoCama','=',1)->orderby('NroHabitacion')->get();

        $this->openModalPopoverAdicionales();
    }

    public function storeAdicionalActor() {
        switch ($this->tipopersona_id) {
            case 1: break; // Agente
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
            $a = ActorReferente::updateOrCreate(['id' => $this->actor_id], [ //Tener en cuenta que está grabando en la tabla de personas, no de agentes
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
            case 3: break; // Personal
            case 4: break; // Proveedor
            case 5: break; // Cliente
            case 6: break; // Vendedor
            case 7: break; // Empresa
        }

    }
}
