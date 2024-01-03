<?php

namespace App\Http\Livewire\Informes;

use App\Models\Areas;
use App\Models\Escala;
use App\Models\Informes\Informe;
use App\Models\Periodo;
use App\Models\Pregunta;
use Livewire\Component;

class InformeComponent extends Component
{
    public $periodosview = false, $escalasview = false, $preguntasview = false, $informesview = false;
    public $pregunta_id=false;
    public $periodos, $escalas, $preguntas, $informes, $areas;
    public $informe_id, $escala_id, $area_id;
    public $editInforme=false;
    public $textopregunta;


    public function render()
    {
        $this->periodos = Periodo::all();
        // dd($this->periodos);
        $this->escalas = Escala::all();
        $this->preguntas= Pregunta::all();
        $this->informes = Informe::orderby('nombreinforme')->get();
        $this->areas = Areas::orderby('areasdescripcion')->get();
// dd($this->informes);
        return view('livewire.informes.informe-component');
    }

    public function Mostrar($opcion)
    {
        switch ($opcion) {
            case 'Periodos': { $this->periodosview=true;$this->escalasview=false;$this->preguntasview=false;$this->informesview=false;
                break; }
            case 'Escalas': { $this->periodosview=false;$this->escalasview=true;$this->preguntasview=false;$this->informesview=false;
                break; }
            case 'Preguntas': { $this->periodosview=false;$this->escalasview=false;$this->preguntasview=true;$this->informesview=false;
                break; }
            case 'Informes': { $this->periodosview=false;$this->escalasview=false;$this->preguntasview=false;$this->informesview=true;
                break; }
        }
    }

    public function agregar($id) {
        switch ($id) {
            case 4: //Preguntas 
                {   $this->editInforme = true; 
                    $this->informe_id=''; $this->area_id='';$this->escala_id='';$this->textopregunta='';
                    break; 
                }
        }
    }

    public function ocultar($id) {
        switch ($id) {
            case 4: //Preguntas 
                { $this->editInforme = false; $this->pregunta_id=''; break; }
        }
    }

    public function store($id) {
        switch ($id) {
            case 4: //Preguntas 
                {   $this->validate([
                    'informe_id' => 'required|integer',
                    'area_id' => 'required|integer',
                    'escala_id' => 'required|integer',
                    'textopregunta' => 'required',
                ]);
            
                Pregunta::updateOrCreate(['id' => $this->pregunta_id], [
                    'informe_id' => $this->informe_id,
                    'area_id' => $this->area_id,
                    'escala_id' => $this->escala_id,
                    'textopregunta' => $this->textopregunta,
                ]);
        
                session()->flash('message', $this->pregunta_id ? 'Pregunta Actualizada.' : 'Pregunta Creada.');
        
                $this->editInforme = false; break; }
        }
    }

    public function editpregunta($id) {
        $pregunta = Pregunta::find($id);
        // $pregunta = Pregunta::where('id','=',$id)->get();
        $this->agregar(4);
        $this->informe_id = $pregunta->informe_id;
        $this->area_id = $pregunta->area_id;
        $this->escala_id = $pregunta->escala_id;
        $this->textopregunta = $pregunta->textopregunta;
        $this->pregunta_id = $id;
    }
}
