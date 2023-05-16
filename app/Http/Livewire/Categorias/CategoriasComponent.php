<?php

namespace App\Http\Livewire\Categorias;

use Livewire\Component;
use App\Models\Categorias;

class CategoriasComponent extends Component
{
    public $isModalOpen = false;
    public $categoria, $categoria_id;
    public $categorias, $nombrecategoria;

    public $empresa_id;

    public function render()
    {
        $this->empresa_id=session('empresa_id');
        $this->categorias = Categorias::where('empresa_id', $this->empresa_id)->get();
        return view('livewire.categorias.categoria-component',['datos'=> Categorias::where('empresa_id', $this->empresa_id)->paginate(3),])->extends('layouts.adminlte');
    }

    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.categorias.createcategoria')->with('isModalOpen', $this->isModalOpen)->with('nombrecategoria', $this->nombrecategoria);
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
        $this->categoria_id = '';

        $this->nombrecategoria = '';
    }
    
    public function store()
    {
        $this->validate([
            'nombrecategoria' => 'required',
        ]);
        Categorias::updateOrCreate(['id' => $this->categoria_id], [
            'nombrecategoria' => $this->nombrecategoria,
            'empresa_id' =>$this->empresa_id,
        ]);

        session()->flash('message', $this->categoria_id ? 'Categoria Actualizado.' : 'Categoria Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $categoria = Categorias::findOrFail($id);
        $this->id = $id;
        $this->categoria_id=$id;
        $this->nombrecategoria = $categoria->nombrecategoria;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Categorias::find($id)->delete();
        session()->flash('message', 'Categoria Eliminado.');
    }
}
