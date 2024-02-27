<?php

namespace App\Http\Livewire\Personas;

use Illuminate\Support\Facades\DB;
use App\Models\Actor;
use App\Models\Actores\ActorReferente;
use App\Models\Beneficios;
use App\Models\Camas;
use App\Models\Cliente;
use App\Models\empresa;
use App\Models\Escolaridades;
use App\Models\EstadosCiviles;
use App\Models\GradoDependencia;
use App\Models\Habitacion;
use App\Models\Iva;
use App\Models\Localidades;
use App\Models\Nacionalidad;
use Livewire\Component;
use App\Models\Persona;
use App\Models\PersonActivo;
use App\Models\Personas;
use App\Models\Referente;
use App\Models\Sexo;
use App\Models\TipoDePersona;
use App\Models\TiposDocumentos;



class PersonaComponent extends Component
{
    public $persona_descripcion, $persona_id, $iva_id, $fingreso, $fegreso, $peso, $referente_id;
    public $personas, $ivas, $referentes;
    
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
        $this->camas = json_decode(DB::table('cama_habitacions')
            ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
            ->where('habitacions.empresa_id',session('empresa_id'))
            ->orderBy('cama_id')
            ->get(),true);

        $this->personas = Persona::all();
        return view('livewire.personas.persona-component')->with('isModalOpen', $this->isModalOpen)->with('personas', $this->personas);

        // $a = New Actor;
        // $a->nueva();
        // $a->agregar();
        // $b = new Personas;
        // $b->agregar();

        // $c=new Referente;
        // $c->vinculo;

        // $b->viviendapropia;
        // $b->telefono;

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
        return view('livewire.personas.persona-component')->with('isModalOpen', $this->isModalOpen);
    }

    // Se encarga de los modales 
    //==========================
    public function openModalPopover() { $this->isModalOpen = true; }
    public function closeModalPopover() { $this->isModalOpen = false; }
    public function openModalPopoverAdicionales() { $this->isModalOpenAdicionales = true; }
    public function closeModalPopoverAdicionales() { $this->isModalOpenAdicionales = false; }
    

    private function resetCreateForm(){
        $this->persona_id = '';
        $this->persona_descripcion = '';
    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required', 
            'documento' => 'required|integer',
            'tipodocumento_id' => 'required|integer', 
            'nacimiento' => 'required|date',
            'estadocivil_id' => 'required|integer',
            'sexo_id' => 'required|integer', 
            // 'email' => 'required|email', 
            'tipopersona_id' => 'required|integer', 
            'nacionalidad_id' => 'required|integer',
            'localidad_id' => 'required|integer',
            'beneficio_id' => 'required|integer',
            'gradodependencia_id' => 'required|integer', 
            'escolaridad_id' => 'required|integer', 
            // 'cama_id' => 'integer', 
            'estado_id' => 'required|integer',
        ]);

        Persona::updateOrCreate(['id' => $this->persona_id], [
            'name' => $this->name, 
            'alias' => $this->alias, 
            'domicilio' => $this->domicilio, 
            'documento' =>  $this->documento,
            'tipodocumento_id' =>  $this->tipodocumento_id, 
            'nacimiento' =>  $this->nacimiento,
            'estadocivil_id' =>  $this->estadocivil_id,
            'sexo_id' =>  $this->sexo_id, 
            'email' =>  $this->email, 
            'tipopersona_id' =>  $this->tipopersona_id, 
            'nacionalidad_id' =>  $this->nacionalidad_id,
            'localidad_id' =>  $this->localidad_id,
            'beneficio_id' =>  $this->beneficio_id,
            'gradodependencia_id' =>  $this->gradodependencia_id, 
            'escolaridad_id' =>  $this->escolaridad_id, 
            'cama_id' =>  $this->cama_id, 
            'estado_id' =>  $this->estado_id,
            'email_verified_at' => $this->nacimiento,
        ]);
        session()->flash('message', $this->persona_id ? 'Persona Actualizada.' : 'Persona Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        $this->id = $id;
        $this->persona_id=$id;
        //$cliente = new empresa;
        //dd($cliente->nombre);
        $this->name = $persona->name;
        $this->alias = $persona->alias;
        $this->domicilio = $persona->domicilio;
        $this->documento = $persona->documento;
        $this->tipodocumento_id = $persona->tipodocumento_id;
        //$this->tipodocumento_id = $persona->tipodocumento_id;
        $this->nacimiento = $persona->nacimiento;
        $this->estadocivil_id = $persona->estadocivil_id;
        $this->sexo_id = $persona->sexo_id ;
        $this->email = $persona->email;
        $this->tipopersona_id = $persona->tipopersona_id;
        $this->nacionalidad_id = $persona->nacionalidad_id;
        $this->localidad_id = $persona->localidad_id;
        $this->beneficio_id = $persona->beneficio_id;
        $this->gradodependencia_id = $persona->gradodependencia_id ;
        $this->escolaridad_id = $persona->escolaridad_id ;
        $this->cama_id = $persona->cama_id ;
        $this->estado_id = $persona->estado_id;
        $this->email_verified_at = $persona->email_verified_at;

        
        //dd($persona->tipodocumento_id);
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Persona::find($id)->delete();
        session()->flash('message', 'Persona Eliminada.');
    }

    public function agregar($id)
    {
        $persona = Persona::findOrFail($id);
        $this->id = $id;
        $this->persona_id=$id;
        //$cliente = new empresa;
        //dd($cliente->nombre);
        $this->name = $persona->name;
        $this->alias = $persona->alias;
        $this->domicilio = $persona->domicilio;
        $this->documento = $persona->documento;
        $this->tipodocumento_id = $persona->tipodocumento_id;
        //$this->tipodocumento_id = $persona->tipodocumento_id;
        $this->nacimiento = $persona->nacimiento;
        $this->estadocivil_id = $persona->estadocivil_id;
        $this->sexo_id = $persona->sexo_id ;
        $this->email = $persona->email;
        $this->tipopersona_id = $persona->tipopersona_id;
        $this->nacionalidad_id = $persona->nacionalidad_id;
        $this->localidad_id = $persona->localidad_id;
        $this->beneficio_id = $persona->beneficio_id;
        $this->gradodependencia_id = $persona->gradodependencia_id ;
        $this->escolaridad_id = $persona->escolaridad_id ;
        $this->cama_id = $persona->cama_id ;
        $this->estado_id = $persona->estado_id;
        $this->email_verified_at = $persona->email_verified_at;
        //dd($persona->tipodocumento_id);
        $this->referentes = Persona::where('tipopersona_id','=',2)->get();

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
            // dd('valido');
            $a = ActorReferente::updateOrCreate(['id' => $this->persona_id], [ //Tener en cuenta que está grabando en la tabla de personas, no de agentes
                'vinculo' => $this->vinculo, 
                'modalidad' => 1, 
                'ultimaocupacion' => $this->ultimaocupacion, 
                'viviendapropia' => $this->viviendapropia, 
                'canthijosvarones' => $this->canthijosvarones, 
                'canthijasmujeres' => $this->canthijasmujeres, 
                'activo' => $this->activo, 
            ]);
            // dd($a);
            break;
            case 3: break; // Personal
            case 4: break; // Proveedor
            case 5: break; // Cliente
            case 6: break; // Vendedor
            case 7: break; // Empresa
        }

    }
}
