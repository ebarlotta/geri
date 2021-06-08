<?php

namespace App\Http\Livewire\PersonaCampos;

use App\Models\PersonasCampos;
use App\Models\TipoDePersona;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PersonasCamposComponent extends Component
{
    
    public $NombreCampo, $TipoCampo, $OrdenCampo, $TipoPersona_id, $LabelCampo;  
    public $personasCampos_id;
    public $PersonasCampos, $TipoDePersonas;
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
        $this->TipoDePersonas=TipoDePersona::all();
        //dd($this->TipoDePersonas);
        return view('livewire.persona-campos.personas-campos')->with('isModalOpen', $this->isModalOpen)->with('TipoDePersonas',$this->TipoDePersonas);
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
        $this->TipoPersona_id = '';
        $this->LabelCampo = '';
    }
    
    public function store()
    {
        $this->validate([
            'NombreCampo' => 'required',
            'TipoCampo' => 'required',
            'OrdenCampo' => 'required|integer',
            'TipoPersona_id' => 'required|integer',
            'LabelCampo' => 'required',
        ]);
    
        PersonasCampos::updateOrCreate(['id' => $this->personasCampos_id], [
            'NombreCampo' => $this->NombreCampo,
            'TipoCampo' => $this->TipoCampo,
            'OrdenCampo' => $this->OrdenCampo,
            'TipoPersona_id' => $this->TipoPersona_id,
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
        $this->TipoPersona_id = $Campo->TipoPersona_id;
        $this->LabelCampo = $Campo->LabelCampo;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        PersonasCampos::find($id)->delete();
        session()->flash('message', 'Campos Eliminados.');
    }
}
