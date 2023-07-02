<?php

namespace App\Http\Livewire\Personas;
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
use App\Models\Persona;
use App\Models\PersonActivo;
use App\Models\TipoDePersona;
use App\Models\TiposDocumentos;

class PersonaComponent extends Component
{
    public $persona_descripcion, $persona_id;
    public $personas;
    public $isModalOpen = false;
    public $tipos_documentos, $estados_civiles, $tipos_de_personas, $nacionalidades, $localidades, $beneficios, $grados_dependencias, $escolaridades, $camas, $person_activos;

    public $name, $alias, $documento, $nacimiento, $email, $domicilio, $tipodocumento_id, $estadocivil_id, $nacionalidad_id, $localidad_id, $beneficio_id, $gradodependencia_id, $cama_id, $escolaridad_id, $sexo, $tipopersona_id, $estado_id, $email_verified_at;

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
        $this->person_activos = PersonActivo::all();
        $this->camas = json_decode(DB::table('cama_habitacions')
            ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
            ->where('habitacions.empresa_id',session('empresa_id'))
            ->orderBy('cama_id')
            ->get(),true);

        $this->personas = Persona::all();
        return view('livewire.personas.persona-component')->with('isModalOpen', $this->isModalOpen)->with('personas', $this->personas);
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

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

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
            'sexo' => 'required|integer', 
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
        
        Persona::updateOrCreate(['id' => $this->persona_id], [
            'name' => $this->name, 
            'alias' => $this->alias, 
            'domicilio' => $this->domicilio, 
            'documento' =>  $this->documento,
            'tipodocumento_id' =>  $this->tipodocumento_id, 
            'nacimiento' =>  $this->nacimiento,
            'estadocivil_id' =>  $this->estadocivil_id,
            'sexo' =>  $this->sexo, 
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
        $this->sexo = $persona->sexo ;
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
}
