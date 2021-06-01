<?php

namespace App\Http\Livewire\Areas;

use App\Models\Areas;
use Livewire\Component;

class AreasComponent extends Component
{
    public $area, $area_id;
    public $areas;
    public $AreasDescripcion;
    public $AreasHabilitada;
    public $isModalOpen = false;

    public function render()
    {
        $this->areas = Areas::all();
        return view('livewire.areas.areas')->with('isModalOpen', $this->isModalOpen)->with('areas', $this->areas);
    }


    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.areas.createareas')->with('isModalOpen', $this->isModalOpen)->with('AreaDescripcion', $this->AreasDescripcion);
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
        $this->area_id = '';
        $this->AreasDescripcion = '';
        $this->AreasHabilitada = true;
    }
    
    public function store()
    {
        $this->validate([
            'AreasDescripcion' => 'required',
        ]);
        Areas::updateOrCreate(['id' => $this->area_id], [
            'AreasDescripcion' => $this->AreasDescripcion,
            'AreasHabilitada' => $this->AreasHabilitada,
        ]);

        session()->flash('message', $this->area_id ? 'Area Actualizada.' : 'Area Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $area = Areas::findOrFail($id);
        $this->id = $id;
        $this->area_id=$id;
        $this->AreasDescripcion = $area->AreasDescripcion;
        $this->AreasHabilitada = $area->AreasHabilitada;
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Areas::find($id)->delete();
        session()->flash('message', 'Area Eliminada.');
    }
}
