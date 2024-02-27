<?php

namespace App\Http\Livewire\Medicamentos;

use App\Models\Medicamento;
use Livewire\Component;
use App\Models\Unidad;

class MedicamentosComponent extends Component
{
    public $nombremedicamento, $unidad_id, $medicamento_id, $cantidad, $psiquiatrico;
    public $medicamentos, $unidades;
    public $isModalOpen, $buscar;

    public function render()
    {
        if(is_null($this->buscar)) {
            $this->medicamentos = Medicamento::orderby('nombremedicamento')
            ->get();
            $this->buscar = '';
        }
        $this->unidades = Unidad::all();
        return view('livewire.medicamentos.medicamentos-component');
    }

    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.medicamentos.createmedicamentos')->with('isModalOpen', $this->isModalOpen);
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
        $this->nombremedicamento = '';
        $this->unidad_id = '';
        $this->cantidad = '';
        $this->psiquiatrico = '';
    }
    
    public function store()
    {
        $this->validate([
            'nombremedicamento' => 'required',
            'unidad_id' => 'required',
            'cantidad' => 'required',
            // 'psiquiatrico' => 'required',
        ]);
    
        Medicamento::updateOrCreate(['id' => $this->medicamento_id], [
            'nombremedicamento' => $this->nombremedicamento,
            'unidad_id' => $this->unidad_id,
            'cantidad' => $this->cantidad,
            'psiquiatrico' => $this->psiquiatrico,
        ]);
        
        session()->flash('message', $this->medicamento_id ? 'Medicamento Actualizado.' : 'Medicamento Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $this->id = $id;
        $this->medicamento_id=$id;
        $this->nombremedicamento = $medicamento->nombremedicamento;
        $this->unidad_id = $medicamento->unidad_id;
        $this->cantidad = $medicamento->cantidad;
        $this->psiquiatrico = $medicamento->psiquiatrico;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Medicamento::find($id)->delete();
        session()->flash('message', 'Medicamento Eliminado.');
    }
    
    public function habilitar($id)
    {
        $medicamento = Medicamento::find($id);
        if($medicamento->psiquiatrico) { $medicamento->psiquiatrico = 0; } else { $medicamento->psiquiatrico = 1; }
        $medicamento->save();
    }

    public function Filtrar($opcion) {
        switch ($opcion) {
            case 'Todos': { 
                $this->medicamentos = Medicamento::orderby('nombremedicamento')
                ->get();
                $this->buscar='';
                break; 
            }
            case 'Psiquiatricos': {
                // dd($this->buscar);
                $this->medicamentos = Medicamento::orderby('nombremedicamento')
                ->where('psiquiatrico','=',true)
                // ->where('nombremedicamento','LIKE',"'%".$this->buscar ."%'")
                ->get();
                break;
            }
            case 'No psiquiatricos': 
                $this->medicamentos = Medicamento::orderby('nombremedicamento')
                ->where('psiquiatrico','=',false)
                // ->where('nombremedicamento','LIKE',"'%".$this->buscar ."%'")
                ->get();
                break;
        }
    }

    public function Buscar() {
        $this->medicamentos = Medicamento::orderby('nombremedicamento')
        ->where('nombremedicamento','LIKE',"%".$this->buscar ."%")
        ->get();
    }

}
