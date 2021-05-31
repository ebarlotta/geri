<?php

namespace App\Http\Livewire\Personactivo;

use App\Models\PersonActivo;
use Livewire\Component;


class PersonActivoComponent extends Component
{
    public $estado, $estados, $estado_id;
    public $isModalOpen = false;

    public function render()
    {
        $this->estados = PersonActivo::all();
        return view('livewire.personactivo.person-activo-component')->with('isModalOpen', $this->isModalOpen)->with('estados', $this->estados);
    }
    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.personactivo.person-activo-component')->with('isModalOpen', $this->isModalOpen)->with('estados', $this->estados);
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
        $this->estado_id = '';
        $this->estado = '';
    }
    
    public function store()
    {
        $this->validate([
            'estado' => 'required',
        ]);
    
        PersonActivo::updateOrCreate(['id' => $this->estado_id], [
            'estado' => $this->estado,
        ]);

        session()->flash('message', $this->estado_id ? 'Estado Actualizado.' : 'Estado Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $estado = PersonActivo::findOrFail($id);
        $this->id = $id;
        $this->estado_id=$id;
        $this->estado = $estado->estado;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        PersonActivo::find($id)->delete();
        session()->flash('message', 'Estado Eliminado.');
    }
}
