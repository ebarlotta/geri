<?php

namespace App\Http\Livewire\Provincias;

use Livewire\Component;
use App\Models\Provincias;

class ProvinciasComponent extends Component
{
    public $provinciaDescripcion, $provincia_id;
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
        return view('livewire.provincias.provincias-component')->with('isModalOpen', $this->isModalOpen)->with('provinciaDescripcion', $this->provinciaDescripcion);
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
        $this->provinciaDescripcion = '';
    }
    
    public function store()
    {
        $this->validate([
            'provinciaDescripcion' => 'required',
        ]);
    
        Provincias::updateOrCreate(['id' => $this->provincia_id], [
            'provinciaDescripcion' => $this->provinciaDescripcion,
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
        $this->provinciaDescripcion = $provincia->provinciaDescripcion;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Provincias::find($id)->delete();
        session()->flash('message', 'Provincia Eliminada.');
    }
}
