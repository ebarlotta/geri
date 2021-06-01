<?php

namespace App\Http\Livewire\Localidades;

use App\Models\Localidades;
use Livewire\Component;


class LocalidadesComponent extends Component
{

    public $localidadDescripcion, $localidadCP, $localidad_id;
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
            ->with('localidadDescripcion', $this->localidadDescripcion);
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
        $this->localidadDescripcion = '';
        $this->localidadCP = '';
    }
    
    public function store()
    {
        $this->validate([
            'localidadDescripcion' => 'required',
            'localidadCP' => 'required',
        ]);
    
        Localidades::updateOrCreate(['id' => $this->localidad_id], [
            'localidadDescripcion' => $this->localidadDescripcion,
            'localidadCP' => $this->localidadCP,
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
        $this->localidadDescripcion = $localidad->localidadDescripcion;
        $this->localidadCP = $localidad->localidadCP;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Localidades::find($id)->delete();
        session()->flash('message', 'Localidad Eliminada.');
    }
}
