<?php

namespace App\Http\Livewire\Ingredientes;

use App\Models\Categorias;
use Livewire\Component;
use App\Models\Ingredientes;
use App\Models\Unidad;

class IngredientesComponent extends Component
{
    public $isModalOpen = false;
    public $ingrediente, $ingrediente_id;
    public $ingredientes, $nombreingrediente, $unidad_id, $categoria_id;
    public $selectcategoria=null;
    public $selectunidad=null;
    public $categorias, $unidades;

    public $empresa_id;

    public function render()
    {
        $this->empresa_id=session('empresa_id');
        $this->categorias = Categorias::where('empresa_id', $this->empresa_id)->get();
        $this->unidades = Unidad::where('empresa_id', $this->empresa_id)->get();
        $this->ingredientes = Ingredientes::where('empresa_id', $this->empresa_id)->get();
        return view('livewire.ingredientes.ingrediente-component',['datos'=> Ingredientes::where('empresa_id', $this->empresa_id)->paginate(3),])->extends('layouts.adminlte');
    }

    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.ingredientes.createingrediente')->with('isModalOpen', $this->isModalOpen)->with('nombreingrediente', $this->nombreingrediente);
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
        $this->ingrediente_id = '';

        $this->nombreingrediente = '';
    }
    
    public function store()
    {
        //dd($this->unidades);
        $this->validate([
            'nombreingrediente' => 'required',
            'unidades' => 'required',
            'categorias' => 'required',
        ]);
        Ingredientes::updateOrCreate(['id' => $this->ingrediente_id], [
            'nombreingrediente' => $this->nombreingrediente,
            'unidad_id' => $this->selectunidad,
            'categoria_id' => $this->selectcategoria,
            'empresa_id' =>$this->empresa_id,
        ]);

        session()->flash('message', $this->ingrediente_id ? 'Ingrediente Actualizado.' : 'Ingrediente Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $ingrediente = Ingredientes::findOrFail($id);
        $this->id = $id;
        $this->ingrediente_id=$id;
        $this->nombreingrediente = $ingrediente->nombreingrediente;
        $this->unidad_id = $ingrediente->unidad_id;
        $this->categoria_id = $ingrediente->categoria_id;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Ingredientes::find($id)->delete();
        session()->flash('message', 'Ingrediente Eliminada.');
    }
}
