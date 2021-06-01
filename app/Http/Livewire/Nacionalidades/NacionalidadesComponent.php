<?php

namespace App\Http\Livewire\Nacionalidades;

use Livewire\Component;
use App\Models\Nacionalidades;

class NacionalidadesComponent extends Component
{
    
    public $nacionalidadDescripcion, $nacionalidad_id;
    public $nacionalidades;
    public $isModalOpen = false;

    public function render()
    {
        $this->nacionalidades = Nacionalidades::all();
        return view('livewire.nacionalidades.nacionalidades-component')->with('isModalOpen', $this->isModalOpen)->with('nacionalidades', $this->nacionalidades);
    }


    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.nacionalidades.nacionalidades-component')->with('isModalOpen', $this->isModalOpen)->with('nacionalidadDescripcion', $this->nacionalidadDescripcion);
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
        $this->nacionalidad_id = '';
        $this->nacionalidadDescripcion = '';
    }
    
    public function store()
    {
        $this->validate([
            'nacionalidadDescripcion' => 'required',
        ]);
    
        Nacionalidades::updateOrCreate(['id' => $this->nacionalidad_id], [
            'nacionalidadDescripcion' => $this->nacionalidadDescripcion,
        ]);

        session()->flash('message', $this->nacionalidad_id ? 'Nacionalidad Actualizada.' : 'Nacionalidad Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $nacionalidad = Nacionalidades::findOrFail($id);
        $this->id = $id;
        $this->nacionalidad_id=$id;
        $this->nacionalidadDescripcion = $nacionalidad->nacionalidadDescripcion;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Nacionalidades::find($id)->delete();
        session()->flash('message', 'Nacionalidad Eliminada.');
    }
}

