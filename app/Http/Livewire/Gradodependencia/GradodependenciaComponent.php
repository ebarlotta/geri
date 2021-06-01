<?php

namespace App\Http\Livewire\Gradodependencia;

use App\Models\GradoDependencia;
use Livewire\Component;


class GradodependenciaComponent extends Component
{
    
    public $gradodependenciaDescripcion, $gradodependencia_id;
    public $gradodependencias;
    public $isModalOpen = false;

    public function render()
    {
        $this->gradodependencias = GradoDependencia::all();
        return view('livewire.gradodependencia.gradodependencia-component')->with('isModalOpen', $this->isModalOpen)->with('gradodependencias', $this->gradodependencias);
    }


    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.gradodependencia.gradodependencia-component')->with('isModalOpen', $this->isModalOpen)->with('gradodependenciaDescripcion', $this->gradodependenciaDescripcion);
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
        $this->gradodependencia_id = '';
        $this->gradodependenciaDescripcion = '';
    }
    
    public function store()
    {
        $this->validate([
            'gradodependenciaDescripcion' => 'required',
        ]);
    
        GradoDependencia::updateOrCreate(['id' => $this->gradodependencia_id], [
            'gradodependenciaDescripcion' => $this->gradodependenciaDescripcion,
        ]);

        session()->flash('message', $this->gradodependencia_id ? 'Grado de dependencia Actualizada.' : 'Grado de dependencia Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $gradodependencia = GradoDependencia::findOrFail($id);
        $this->id = $id;
        $this->gradodependencia_id=$id;
        $this->gradodependenciaDescripcion = $gradodependencia->gradodependenciaDescripcion;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        GradoDependencia::find($id)->delete();
        session()->flash('message', 'Grado de dependencia Eliminada.');
    }
}
