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
use App\Models\ObraSocial;
use App\Models\PersonActivo;
use App\Models\TipoDePersona;
use App\Models\TiposDocumentos;
use App\Models\Sexo;

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
    
    public $sexos;
    public $obrassociales;
    public $actor_id;
    public $isModalOpen = false;
    public $tipos_documentos;
    public $estados_civiles;
    public $tipos_de_actores;
    public $nacionalidades;
    public $localidades;
    public $escolaridades;
    
    public $tipoactor_id=0; // Se encuentra solo este parámetro porque decide que objeto se utiliza

    public $beneficios;
    public $grados_dependencias;
    public $camas;
    public $alias;
    
    //public $beneficio_id;
    public $gradodependencia_id;
    public $cama_id;
    //public $estado_id;
    public $email_verified_at;

    public function render()
    {
        $this->tipos_documentos = TiposDocumentos::all();
        $this->estados_civiles = EstadosCiviles::all();
        $this->tipos_de_actores = TipoDePersona::where('id','>',0)->orderby('tipodepersona')->get();
        $this->nacionalidades = Nacionalidad::where('id','>',0)->orderby('nacionalidad_descripcion')->get();
        $this->localidades = Localidades::where('id','>',0)->orderby('localidad_descripcion')->get();
        $this->escolaridades = Escolaridades::all();
        $this->obrassociales = ObraSocial::all();
        //dd($this->obrassociales);
        $this->sexos = Sexo::all();

        // $this->beneficios = Beneficios::all();
        // $this->grados_dependencias = GradoDependencia::all();
        // $this->person_activos = PersonActivo::all();
        // $this->camas = json_decode(DB::table('cama_habitacions')
        //     ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
        //     ->where('habitacions.empresa_id',session('empresa_id'))
        //     ->orderBy('cama_id')
        //     ->get(),true);

        $this->actores = Actor::where('empresa_id','=',session('empresa_id'))->get();
        return view('livewire.actores.actores-component')->with('isModalOpen', $this->isModalOpen);
    }

    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
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
        $this->nombre = '';
        $this->documentotipo_id = 0;
        $this->documentonro = 0;
        $this->nacimiento = null;
        $this->direccion = 0;
        $this->estadocivil_id = 0;
        $this->sexo_id = 0;
        $this->email='';
        $this->tipopersona_id=0;
        $this->nacionalidad_id=0;
        $this->localidad_id=0;
        $this->escolaridad_id=0;
        $this->telefono='';
        $this->obrasocial_id=0;
        $this->activo=true;

    }
    
    public function store()
    {
        $this->validate([
            'nombre' => 'required', 
            'documentonro' => 'required|integer',
            'documentotipo_id' => 'required|integer', 
            'nacimiento' => 'required|date',
            'direccion' => 'required',
            'sexo_id' => 'required|integer', 
            'estadocivil_id' => 'required|integer',
            'obrasocial_id' => 'required|integer',
            'email' => 'required|email', 
            'tipopersona_id' => 'required|integer', 
            'nacionalidad_id' => 'required|integer',
            'localidad_id' => 'required|integer',
            'escolaridad_id' => 'required|integer',
            'telefono' => 'required|integer',
            //'beneficio_id' => 'required|integer',
            //'gradodependencia_id' => 'required|integer', 
            // 'cama_id' => 'integer', 
            //'estado_id' => 'required|integer',
        ]);
        
        Actor::updateOrCreate(['id' => $this->actor_id], [
            'nombre' => $this->nombre, 
            'documentonro' =>  $this->documentonro,
            'documentotipo_id' =>  $this->documentotipo_id, 
            'nacimiento' =>  $this->nacimiento,
            'direccion' => $this->direccion, 
            'sexo_id' =>  $this->sexo_id, 
            'estadocivil_id' =>  $this->estadocivil_id,
            'obrasocial_id' => $this->obrasocial_id,
            'email' =>  $this->email, 
            'nacionalidad_id' =>  $this->nacionalidad_id,
            'localidad_id' =>  $this->localidad_id,
            'escolaridad_id' =>  $this->escolaridad_id,
            'telefono' =>  $this->telefono,
            'avatar' => '',
            'empresa_id'=>session('empresa_id'),
            'activo'=>$this->activo,
            
            'tipopersona_id' =>  $this->tipoactor_id,

            //'alias' => $this->alias, 
            //'beneficio_id' =>  $this->beneficio_id,
            //'gradodependencia_id' =>  $this->gradodependencia_id, 
            //'cama_id' =>  $this->cama_id, 
            //'estado_id' =>  $this->estado_id,
            //'email_verified_at' => $this->nacimiento,
        ]);

        session()->flash('message', $this->actor_id ? 'Actor Actualizado.' : 'Actor Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $actor = Actor::findOrFail($id);
        $this->id = $id;
        $this->actor_id=$id;
        $this->nombre = $actor->nombre;
        $this->documentonro = $actor->documentonro;
        $this->documentotipo_id = $actor->documentotipo_id;
        $this->nacimiento = $actor->nacimiento;
        $this->direccion = $actor->direccion;
        $this->sexo_id = $actor->sexo_id ;
        $this->estadocivil_id = $actor->estadocivil_id;
        $this->obrasocial_id = $actor->obrasocial_id;
        $this->email = $actor->email;
        $this->nacionalidad_id = $actor->nacionalidad_id;
        $this->localidad_id = $actor->localidad_id;
        $this->escolaridad_id = $actor->escolaridad_id;
        $this->telefono = $actor->telefono;
        $this->activo = $actor->activo;

        // $this->tipoactor_id = $actor->tipoactor_id;
        //$this->alias = $actor->alias;
        //$this->documentotipo_id = $actor->documentotipo_id;
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
