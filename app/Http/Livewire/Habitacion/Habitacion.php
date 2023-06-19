<?php

namespace App\Http\Livewire\Habitacion;

use Livewire\Component;
use App\Models\Habitacion as Hab;

class Habitacion extends Component
{
    public $isModalOpen=false;
    public $habitaciones;
    public $habitacion_id; 
    public $descripcion;
    public $nrohabitacion;
    public $activa; 
    public $sexo;

    public function render()
    {
        // dd(session('empresa_id'));
        $this->habitaciones = Hab::where('empresa_id',session('empresa_id'))->get();
        //dd($this->habitaciones);
        return view('livewire.habitacion.habitacion-component');
    }

    public function create()
    {
        //$this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.habitacion.createhabitacion')->with('isModalOpen', $this->isModalOpen);
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function edit($id)
    {
        $habitacion = Hab::findOrFail($id);
        $this->id = $id;
        $this->habitacion_id = $id;
        $this->nrohabitacion=$habitacion->nrohabitacion;
        $this->descripcion = $habitacion->descripcion;
        $this->activa = $habitacion->activa;
        $this->sexo = $habitacion->sexo;
        
        $this->openModalPopover();
    }

    public function store()
    {
        $this->validate([
            'nrohabitacion' => 'required|integer',
            'descripcion' => 'required',
            'activa' => 'required',
            'sexo' => 'required',
        ]);
   // dd($this->habitacion_id);
        $this->habitacion_id = Hab::updateOrCreate(['id' => $this->habitacion_id], [
            'nrohabitacion' => $this->nrohabitacion,
            'descripcion' => $this->descripcion,
            'activa' => $this->activa,
            'sexo' => $this->sexo,
            'empresa_id' => session('empresa_id'),
        ]);

        session()->flash('message', $this->habitacion_id ? 'Habitacion Actualizada.' : 'Habitacion Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->nrohabitacion = '';
        $this->descripcion = '';
        $this->activa = '';
        $this->sexo = '';
    }

    public function delete($id)
    {
        Hab::find($id)->delete();
        session()->flash('message', 'Habitación Eliminada.');
    }

    public function habilitar($id,$estado)
    {
        $hab = Hab::find($id);
        if($estado) { $hab->activa = 0; } else { $hab->activa = 1; }
        $hab->save();
    }

    public function cambiar($id,$sexo)
    {
        $hab = Hab::find($id);
        if($sexo) { $hab->sexo = 0; } else { $hab->sexo = 1; }
        $hab->save();
    }

}
