<?php

namespace App\Http\Livewire\PersonaCampos;

use App\Models\PersonasCampos;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PersonasCamposComponent extends Component
{
    
    public $NombreCampo, $TipoCampo, $OrdenCampo, $LabelCampo;  
    public $personasCampos_id;
    public $PersonasCampos;
    public $isModalOpen = false;

    public function render()
    {
         //= PersonasCampos::order('OrdenCampo')->get();
        $this->PersonasCampos = DB::table('personas_campos')
                ->orderBy('OrdenCampo', 'asc')
                ->get();
        return view('livewire.persona-campos.personas-campos')->with('isModalOpen', $this->isModalOpen)->with('PersonasCampos', $this->PersonasCampos);
    }


    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.persona-campos.personas-campos')->with('isModalOpen', $this->isModalOpen);
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
        $this->personasCampos_id = '';
        $this->NombreCampo = '';
        $this->TipoCampo = '';
        $this->OrdenCampo = '';
        $this->LabelCampo = '';
    }
    
    public function store()
    {
        $this->validate([
            'NombreCampo' => 'required',
            'TipoCampo' => 'required',
            'OrdenCampo' => 'required|integer',
            'LabelCampo' => 'required',
        ]);
    
        PersonasCampos::updateOrCreate(['id' => $this->personasCampos_id], [
            'NombreCampo' => $this->NombreCampo,
            'TipoCampo' => $this->TipoCampo,
            'OrdenCampo' => $this->OrdenCampo,
            'LabelCampo' => $this->LabelCampo,
        ]);

        session()->flash('message', $this->personasCampos_id ? 'Campos Actualizads.' : 'Campos Creadados.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $Campo = PersonasCampos::findOrFail($id);
        $this->id = $id;
        $this->personasCampos_id=$id;

        $this->NombreCampo = $Campo->NombreCampo;
        $this->TipoCampo = $Campo->TipoCampo;
        $this->OrdenCampo = $Campo->OrdenCampo;
        $this->LabelCampo = $Campo->LabelCampo;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        PersonasCampos::find($id)->delete();
        session()->flash('message', 'Campos Eliminados.');
    }
}
