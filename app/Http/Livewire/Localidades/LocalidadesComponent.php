<?php

namespace App\Http\Livewire\Localidades;

use App\Models\Localidades;
use Livewire\Component;


class LocalidadesComponent extends Component
{

    public $localidad_descripcion, $localidad_cp, $localidad_id;
    public $localidades;
    public $isModalOpen = false;

    public function render()
    {
        $this->localidades = Localidades::all();
        return view('livewire.localidades.localidades-component')->with('isModalOpen', $this->isModalOpen)->with('localidades', $this->localidades);
    }


    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.localidades.localidades-component')
            ->with('isModalOpen', $this->isModalOpen)
            ->with('localidad_descripcion', $this->localidad_descripcion);
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
        $this->localidad_id = '';
        $this->localidad_descripcion = '';
        $this->localidad_cp = '';
    }
    
    public function store()
    {
        $this->validate([
            'localidad_descripcion' => 'required',
            'localidad_cp' => 'required',
        ]);
    
        Localidades::updateOrCreate(['id' => $this->localidad_id], [
            'localidad_descripcion' => $this->localidad_descripcion,
            'localidad_cp' => $this->localidad_cp,
        ]);

        session()->flash('message', $this->localidad_id ? 'Localidad Actualizada.' : 'Localidad Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $localidad = Localidades::findOrFail($id);
        $this->id = $id;
        $this->localidad_id=$id;
        $this->localidad_descripcion = $localidad->localidad_descripcion;
        $this->localidad_cp = $localidad->localidad_cp;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Localidades::find($id)->delete();
        session()->flash('message', 'Localidad Eliminada.');
    }
}
