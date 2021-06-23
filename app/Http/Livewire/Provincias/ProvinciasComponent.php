<?php

namespace App\Http\Livewire\Provincias;

use Livewire\Component;
use App\Models\Provincias;

class ProvinciasComponent extends Component
{
    public $provincia_descripcion, $provincia_id;
    public $provincias;
    public $isModalOpen = false;

    public function render()
    {
        $this->provincias = Provincias::all();
        return view('livewire.provincias.provincias-component')->with('isModalOpen', $this->isModalOpen)->with('provincias', $this->provincias);
    }


    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.provincias.provincias-component')->with('isModalOpen', $this->isModalOpen)->with('provincia_descripcion', $this->provincia_descripcion);
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
        $this->provincia_id = '';
        $this->provincia_descripcion = '';
    }
    
    public function store()
    {
        $this->validate([
            'provincia_descripcion' => 'required',
        ]);
    
        Provincias::updateOrCreate(['id' => $this->provincia_id], [
            'provincia_descripcion' => $this->provincia_descripcion,
        ]);

        session()->flash('message', $this->provincia_id ? 'Provincia Actualizada.' : 'Provincia Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $provincia = Provincias::findOrFail($id);
        $this->id = $id;
        $this->provincia_id=$id;
        $this->provincia_descripcion = $provincia->provincia_descripcion;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Provincias::find($id)->delete();
        session()->flash('message', 'Provincia Eliminada.');
    }
}
