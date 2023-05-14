<?php

namespace App\Http\Livewire\Interfaces;

use App\Models\Interfaces;
use App\Models\PersonasCampos;
use App\Models\RelInterfacesCampos;
use App\Models\TipoDePersona;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InterfacesComponent extends Component
{
    public $NombreInterface;
    public $interface_id;
    public $Interfaces;
    public $isModalOpen = false;
    public $showCampos = null;
    public $campos = [];
    public $disponibles;
    public $utilizados;
    public $tipos;
    public $tipo_de_persona_id;
    public $creando;

    public function render()
    {
        $this->Interfaces = Interfaces::all();
        
         //$this->Interfaces->tipos = RelInterfacesCampos::find(1)->tipospersonas;
         //$comments = Interfaces::find(7);
         //dd($comments->tipodepersonas->tipodepersona);
        return view('livewire.interfaces.interfaces-component');
    }

    public function create()
    {
        $this->creando = true;
        //dd($this->disponibles);
        $this->disponibles=DB::table('personas_campos')->get();
        //$this->disponibles = PersonasCampos::all();

        //->where('TipoPersona_id','=','1')
        // dd($this->disponibles);
        //$this->disponibles = DB::table('rel_interfaces_campos')
        //    ->join('personas_campos', 'rel_interfaces_campos.campo_id', '<>', 'personas_campos.id')
        //    ->get();

        $this->utilizados = DB::table('rel_interfaces_campos')
            ->join('personas_campos', 'rel_interfaces_campos.campo_id', '=', 'personas_campos.id')
            ->get();
        //$this->utilizados = Interfaces::find(2)->campos;

        //dd($this->utilizados);
        // $this->restantes = DB::table('rel_interfaces_campos','personas_campos')
        //     ->select('personas_campos.NombreCampo')
        //     ->where('personas_campos.id','rel_interfaces_campos.id_campo')
        //     ->get();

        $tipos = TipoDePersona::all();
        //dd($tipos);
        $this->tipos = $tipos;

        $this->resetCreateForm();
        $this->openModalPopover();
        return view('livewire.interfaces.interfaces-component')
            ->with('isModalOpen', $this->isModalOpen);
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
        $this->interface_id = '';
        $this->creando = false;
    }

    private function resetCreateForm()
    {
        $this->interface_id = '';
        $this->NombreInterface = '';
    }

    public function store()
    {
        $this->validate([
            'NombreInterface' => 'required',
            'tipo_de_persona_id' => 'required',
        ]);

        Interfaces::updateOrCreate(['id' => $this->interface_id], [
            'NombreInterface' => $this->NombreInterface,
            'tipo_de_persona_id' => $this->tipo_de_persona_id,
        ]);

        session()->flash('message', $this->interface_id ? 'Interface Actualizada.' : 'Interface Creada.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $Interface = Interfaces::findOrFail($id);
        $this->id = $id;
        $this->interface_id = $id;
        $this->NombreInterface = $Interface->NombreInterface;
        $this->tipo_de_persona_id = $Interface->tipo_de_persona_id;
        
        $tipos = TipoDePersona::all();
        $this->tipos = $tipos;
        //SELECT * FROM rel_interfaces_campos, personas_campos WHERE interface_id=1 and campo_id=personas_campos.id;
        
        $this->disponibles=DB::select(DB::raw("SELECT * FROM personas_campos WHERE 1"));
        $this->utilizados=DB::select(DB::raw("SELECT * FROM rel_interfaces_campos INNER join personas_campos on rel_interfaces_campos.campo_id=personas_campos.id and rel_interfaces_campos.interface_id=" . $id . ";"));
        // $this->utilizados=DB::select(DB::raw("SELECT * FROM rel_interfaces_campos, personas_campos WHERE interface_id=".$id." and campo_id=personas_campos.id and rel_interfaces_campos.=".$id.";"));

        //dd($this->disponibles);
        //$this->disponibles=DB::table('personas_campos')->get();

        $this->creando = false;
        $this->openModalPopover();
    }

    public function delete($id)
    {
        Interfaces::find($id)->delete();
        session()->flash('message', 'Interface Eliminada.');
    }

    public function mostrar($id)
    {
        $a = '';
        $this->campos = DB::table('rel_interfaces_campos')
            ->join('personas_campos', function ($join) {
                $join->on('rel_interfaces_campos.campo_id', '=', 'personas_campos.id');
            })
            ->where('rel_interfaces_campos.interface_id', '=', $id)
            ->get();
            
        foreach ($this->campos as $cam) {
            if ($cam->TipoCampo == 'Texto') {
                $a = $a . '<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">' . $cam->LabelCampo . '</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="' . $cam->LabelCampo . '" wire:model="NombreInterface">';
            }
            
            if ($cam->TipoCampo == 'Numérico') {
                $a = $a . '<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">' . $cam->LabelCampo . '</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="' . $cam->LabelCampo . '" wire:model="NombreInterface">';
            }
        }
        $this->showCampos = $a;
    }

    public function DarAltaCampo($id)
    {
        
        $registro1 = DB::select(DB::raw("SELECT * FROM rel_interfaces_campos WHERE interface_id=" . $this->interface_id . " and campo_id=" . $id)); 
        if($registro1==[]) { 
            RelInterfacesCampos::create(['interface_id' => $this->interface_id, 'campo_id' => $id]); 
        } else{
            session()->flash('message', 'Registro ya dado de alta');
        }
        $this->disponibles=DB::select(DB::raw("SELECT * FROM personas_campos WHERE 1"));
        $this->utilizados=DB::select(DB::raw("SELECT * FROM rel_interfaces_campos INNER join personas_campos on rel_interfaces_campos.campo_id=personas_campos.id and rel_interfaces_campos.interface_id=" . $this->interface_id . ";"));
        
    }

    public function DarBajaCampo($id)
    {
        $registro1 = DB::select(DB::raw("SELECT * FROM rel_interfaces_campos WHERE interface_id=" . $this->interface_id . " and campo_id=" . $id)); 
        $registro = RelInterfacesCampos::find($registro1[0]->id);
        $registro->delete();

        $this->disponibles=DB::select(DB::raw("SELECT * FROM personas_campos WHERE 1"));
        $this->utilizados=DB::select(DB::raw("SELECT * FROM rel_interfaces_campos INNER join personas_campos on rel_interfaces_campos.campo_id=personas_campos.id and rel_interfaces_campos.interface_id=" . $this->interface_id . ";"));
    }
    
    
}
