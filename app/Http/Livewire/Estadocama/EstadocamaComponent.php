<?php

namespace App\Http\Livewire\Estadocama;

use Livewire\Component;
use App\Models\Camas;
use Illuminate\Support\Facades\DB;


class EstadocamaComponent extends Component
{
    
    public $NroHabitacion, $NroCama, $SexoCama=0, $EstadoCama=0, $cama_id;
    public $camas;
    public $isModalOpen = false;

    public function render()
    {
        $this->camas = DB::table('camas')
            ->orderBy('NroHabitacion', 'asc')
            ->orderBy('NroCama', 'asc')
            ->get();
            //dd($this->camas);
        return view('livewire.estadocama.estadocama-component')->with('isModalOpen', $this->isModalOpen)->with('camas', $this->camas);
    }


    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.estadocama.estadocama-component')->with('isModalOpen', $this->isModalOpen)->with('camas', $this->camas);
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
        $this->cama_id = '';
        $this->NroHabitacion = '';
        $this->NroCama = '';
        $this->SexoCama = '';
        $this->EstadoCama = '';
    }
    
    public function store()
    {
        $this->validate([
            'NroHabitacion' => 'required',
            'NroCama' => 'required',
            'EstadoCama' => 'required',
            'SexoCama' => 'required',
        ]);
    
        Camas::updateOrCreate(['id' => $this->cama_id], [
            'NroCama' => $this->NroCama,
            'NroHabitacion' => $this->NroHabitacion,
            'SexoCama' => $this->SexoCama,
            'EstadoCama' => $this->EstadoCama,
        ]);
        
        session()->flash('message', $this->cama_id ? 'Cama Actualizada.' : 'Cama Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $cama = Camas::findOrFail($id);
        $this->id = $id;
        $this->cama_id=$id;
        $this->NroHabitacion = $cama->NroHabitacion;
        $this->NroCama = $cama->NroCama;
        $this->EstadoCama = $cama->EstadoCama;
        $this->SexoCama = $cama->SexoCama;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Camas::find($id)->delete();
        session()->flash('message', 'Cama Eliminada.');
    }
    
    public function habilitar($id,$estado)
    {
        $cama = Camas::find($id);
        if($estado) { $cama->EstadoCama = 0; } else { $cama->EstadoCama = 1; }
        $cama->save();
    }

    public function cambiar($id,$sexo)
    {
        $cama = Camas::find($id);
        if($sexo) { $cama->SexoCama = 0; } else { $cama->SexoCama = 1; }
        $cama->save();
    }
}
