<?php

namespace App\Http\Livewire\Beneficios;
use Livewire\Component;
use App\Models\Beneficios;

class clsBeneficios extends Component
{
    public $descripcionbeneficio, $beneficio_id;
    public $beneficios;
    public $isModalOpen = false;
    //public $control = 0;
    
    public function render()
    {
        $this->beneficios = Beneficios::all();
        //return view('liveware.crudbeneficios')->with('isModalOpen', $this->isModalOpen)->with('beneficios', $this->beneficios);
        return view('livewire.beneficios.crudbeneficios')
            ->with('isModalOpen', $this->isModalOpen)
            ->with('beneficios', $this->beneficios);
}

    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.beneficios.crudbeneficios')->with('isModalOpen', $this->isModalOpen)->with('beneficios', $this->beneficios);
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
        $this->beneficio_id = '';
        $this->descripcionbeneficio = '';
    }
    
    public function store()
    {
        $this->validate([
            'descripcionbeneficio' => 'required',
        ]);
    
        Beneficios::updateOrCreate(['id' => $this->beneficio_id], [
            'descripcionbeneficio' => $this->descripcionbeneficio,
        ]);

        session()->flash('message', $this->beneficio_id ? 'Beneficio Actualizado.' : 'Beneficio Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $beneficio = Beneficios::findOrFail($id);
        $this->id = $id;
        $this->beneficio_id = $id;
        $this->descripcionbeneficio = $beneficio->descripcionbeneficio;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Beneficios::find($id)->delete();
        session()->flash('message', 'Beneficio Eliminado.');
    }
}