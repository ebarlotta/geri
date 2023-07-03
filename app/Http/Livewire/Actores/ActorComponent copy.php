<?php

namespace App\Http\Livewire\Actores;
use Illuminate\Support\Facades\DB;

use App\Models\Beneficios;
use App\Models\Camas;
use App\Models\Cliente;
use App\Models\empresa;
use App\Models\Escolaridades;
use App\Models\EstadosCiviles;
use App\Models\GradoDependencia;
use App\Models\Habitacion;
use App\Models\Localidades;
use App\Models\Nacionalidad;
use Livewire\Component;
use App\Models\Actor;
use App\Models\PersonActivo;
use App\Models\TipoDePersona;
use App\Models\TiposDocumentos;

class ActorComponent extends Component
{
    
    public $nombre;
    public $documentotipo_id;
    public $documentonro;
    public $nacimiento;
    public $direccion;
    public $estadocivil_id;
    public $sexo_id;
    public $email;
    public $nacionalidad_id;
    public $localidad_id;
    public $obrasocial_id;
    public $escolaridad_id;
    public $telefono;
    public $avatar;
    public $empresa_id;
    public $activo;
    
    public $actores;
    
    public $actor_id;
    public $persona_descripcion;
    public $isModalOpen = false;
    public $tipos_documentos;
    public $estados_civiles;
    public $tipos_de_personas;
    public $nacionalidades;
    public $localidades;
    public $beneficios;
    public $grados_dependencias;
    public $escolaridades;
    public $camas;
    public $person_activos;
    public $alias;
    public $beneficio_id;
    public $gradodependencia_id;
    public $cama_id;
    public $tipopersona_id;
    public $estado_id;
    public $email_verified_at;

    public function render()
    {
        $this->tipos_documentos = TiposDocumentos::all();
        $this->estados_civiles = EstadosCiviles::all();
        $this->tipos_de_personas = TipoDePersona::all();
        $this->nacionalidades = Nacionalidad::all();
        $this->localidades = Localidades::all();
        $this->escolaridades = Escolaridades::all();

        // $this->beneficios = Beneficios::all();
        // $this->grados_dependencias = GradoDependencia::all();
        // $this->person_activos = PersonActivo::all();
        // $this->camas = json_decode(DB::table('cama_habitacions')
        //     ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
        //     ->where('habitacions.empresa_id',session('empresa_id'))
        //     ->orderBy('cama_id')
        //     ->get(),true);

        $this->actores = Actor::where('empresa_id','=',session('empresa_id'))->get();
        return view('livewire.actores.actores-component')->with('isModalOpen', $this->isModalOpen)->with('personas', $this->personas);
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
        // $this->beneficios = Beneficios::all();
        // $this->grados_dependencias = GradoDependencia::all();
        // $this->escolaridades = Escolaridades::all();
        // $this->person_activos = PersonActivo::all();
        // $this->camas = json_decode(DB::table('cama_habitacions')
        //     ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
        //     ->where('habitacions.empresa_id',session('empresa_id'))
        //     ->orderBy('cama_id')
        //     ->get(),true);
        return view('livewire.actores.actores-component')->with('isModalOpen', $this->isModalOpen);
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->actor_id = '';
        $this->persona_descripcion = '';
    }
    
    public function store()
    {
        $this->validate([
            'nombre' => 'required', 
            'documentonro' => 'required|integer',
            'documentotipo_id' => 'required|integer', 
            'nacimiento' => 'required|date',
            'estadocivil_id' => 'required|integer',
            'sexo_id' => 'required|integer', 
            'email' => 'required|email', 
            'tipopersona_id' => 'required|integer', 
            'nacionalidad_id' => 'required|integer',
            'localidad_id' => 'required|integer',
            'beneficio_id' => 'required|integer',
            'gradodependencia_id' => 'required|integer', 
            'escolaridad_id' => 'required|integer', 
            // 'cama_id' => 'integer', 
            'estado_id' => 'required|integer',
        ]);
        
        Actor::updateOrCreate(['id' => $this->actor_id], [
            'nombre' => $this->nombre, 
            'alias' => $this->alias, 
            'direccion' => $this->direccion, 
            'documentonro' =>  $this->documentonro,
            'documentotipo_id' =>  $this->documentotipo_id, 
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

        session()->flash('message', $this->actor_id ? 'ACtor Actualizado.' : 'Actor Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $persona = Actor::findOrFail($id);
        $this->id = $id;
        $this->actor_id=$id;
        //$cliente = new empresa;
        //dd($cliente->nombre);
        $this->nombre = $persona->nombre;
        $this->alias = $persona->alias;
        $this->direccion = $persona->direccion;
        $this->documentonro = $persona->documentonro;
        $this->documentotipo_id = $persona->documentotipo_id;
        //$this->documentotipo_id = $persona->documentotipo_id;
        $this->nacimiento = $persona->nacimiento;
        $this->estadocivil_id = $persona->estadocivil_id;
        $this->sexo_id = $persona->sexo_id ;
        $this->email = $persona->email;
        // $this->tipopersona_id = $persona->tipopersona_id;
        $this->nacionalidad_id = $persona->nacionalidad_id;
        $this->localidad_id = $persona->localidad_id;
        // $this->beneficio_id = $persona->beneficio_id;
        // $this->gradodependencia_id = $persona->gradodependencia_id ;
        // $this->escolaridad_id = $persona->escolaridad_id ;
        // $this->cama_id = $persona->cama_id ;
        // $this->estado_id = $persona->estado_id;
        // $this->email_verified_at = $persona->email_verified_at;
        //dd($persona->documentotipo_id);
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Actor::find($id)->delete();
        session()->flash('message', 'Actor Eliminado.');
    }
}
