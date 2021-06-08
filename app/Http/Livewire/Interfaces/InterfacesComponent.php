<?php

namespace App\Http\Livewire\Interfaces;

use App\Models\Interfaces;
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

    public function render()
    {
        $this->Interfaces = Interfaces::all();
        return view('livewire.interfaces.interfaces-component');
    }

    public function create()
    {
    //dd($this->disponibles);
    $this->disponibles=DB::table('personas_campos')
        ->where('TipoPersona_id','=','1')
        ->get();
    //dd($this->Restantes);
    // $this->utilizados = DB::table('rel_interfaces_campos')
    //         ->join('personas_campos', 'rel_interfaces_campos.id_campo', '=', 'personas_campos.id')            
    //         ->get();

    $this->utilizados = Interfaces::find(2)->campos;

    dd($this->utilizados);
    // $this->restantes = DB::table('rel_interfaces_campos','personas_campos')
    //     ->select('personas_campos.NombreCampo')
    //     ->where('personas_campos.id','rel_interfaces_campos.id_campo')
    //     ->get();
    
        $this->resetCreateForm();
        $this->openModalPopover();
        return view('livewire.interfaces.interfaces-component')
            ->with('isModalOpen', $this->isModalOpen)
            ;
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
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
        ]);

        Interfaces::updateOrCreate(['id' => $this->interface_id], [
            'NombreInterface' => $this->NombreInterface,
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

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Interfaces::find($id)->delete();
        session()->flash('message', 'Interface Eliminada.');
    }

    public function mostrar($id)
    {
        $a='';
        $this->campos = DB::table('rel_interfaces_campos')
            ->join('personas_campos', function ($join) {
                $join->on('rel_interfaces_campos.campo_id', '=', 'personas_campos.id');
            })
            ->where('rel_interfaces_campos.interface_id', '=', $id)
            ->get();

        foreach ($this->campos as $cam) {
            if ($cam->TipoCampo == 'text') {
                $a = $a .'<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">'. $cam->LabelCampo .'</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="'. $cam->LabelCampo .'" wire:model="NombreInterface">';
            }
            if ($cam->TipoCampo == 'integer') {
                $a = $a .'<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">'. $cam->LabelCampo .'</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="'. $cam->LabelCampo .'" wire:model="NombreInterface">';
            }
        }
        $this->showCampos=$a;
    }
}
