<?php

namespace App\Http\Livewire\Tiposdedocumentos;

use App\Models\TiposDocumentos;
use Livewire\Component;

class TiposDeDocumentosComponent extends Component
{

    public $tipodedocumento, $tiposdedocumentos, $tipodedocumento_id;
    public $isModalOpen = false;

    public function render()
    {
        $this->tiposdedocumentos = TiposDocumentos::all();
        return view('livewire.tiposdedocumentos.tipos-de-documentos-component')->with('isModalOpen', $this->isModalOpen)->with('tiposdedocumentos', $this->tiposdedocumentos);
    }
    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.tiposdedocumentos.tipos-de-documentos-component')->with('isModalOpen', $this->isModalOpen)->with('tiposdedocumentos', $this->tiposdedocumentos);
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
        $this->tipodedocumento_id = '';
        $this->tipodedocumento = '';
    }
    
    public function store()
    {
        $this->validate([
            'tipodedocumento' => 'required',
        ]);
    
        TiposDocumentos::updateOrCreate(['id' => $this->tipodedocumento_id], [
            'tipodocumento' => $this->tipodedocumento,
        ]);

        session()->flash('message', $this->tipodedocumento_id ? 'Tipo de Documento Actualizado.' : 'Tipo de Documento Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $tipodedocumento = TiposDocumentos::findOrFail($id);
        $this->id = $id;
        $this->tipodedocumento_id=$id;
        $this->tipodedocumento = $tipodedocumento->tipodedocumento;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        TiposDocumentos::find($id)->delete();
        session()->flash('message', 'Tipo de Documento Eliminado.');
    }

}

