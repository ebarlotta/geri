<?php

namespace App\Http\Livewire\Actores;

use Illuminate\Support\Facades\DB;
use App\Models\Actor;
use App\Models\Actores\ActorAgente;
use App\Models\Actores\ActorCliente;
use App\Models\Actores\ActorEmpresa;
use App\Models\Actores\ActorPersonal;
use App\Models\Actores\ActorProveedor;
use App\Models\Actores\ActorReferente;
use App\Models\Actores\ActorVendedor;
use App\Models\AgenteInforme;
use App\Models\Areas;
use App\Models\Beneficios;
use App\Models\Camas;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Escolaridades;
use App\Models\EstadosCiviles;
use App\Models\GradoDependencia;
use App\Models\Habitacion;
use App\Models\Informes\Informe;
use App\Models\Informes\InformeRespuestas;
use App\Models\Iva;
use App\Models\Localidades;
use App\Models\Nacionalidad;
use Livewire\Component;
use App\Models\PersonActivo;
use App\Models\Personas;
use App\Models\Pregunta;
use App\Models\Referente;
use App\Models\Sexo;
use App\Models\Sociales\DatosSocial;
use App\Models\TipoDePersona;
use App\Models\TiposDocumentos;
use App\Models\EmpresaUsuario;
use Illuminate\Support\Facades\Auth;

class ActorComponent extends Component
{
    public $persona_descripcion, $actor_id, $iva_id, $fingreso, $fegreso, $peso, $telefono, $nombreempresa, $motivosegresos, $gradodependencia, $referente_id;
    public $actores, $ivas, $referentes;
    
    public $tipos_documentos, $estados_civiles, $tipos_de_personas, $nacionalidades, $localidades, $beneficios, $grados_dependencias, $escolaridades, $camas, $person_activos, $sexos, $datossociales_id, $historiadevida;

    public $camas22;
    public $radios, $temporal;

    public $name, $alias, $documento, $nacimiento, $email, $domicilio, $tipodocumento_id, $estadocivil_id, $nacionalidad_id, $localidad_id, $beneficio_id, $gradodependencia_id, $cama_id, $escolaridad_id, $sexo_id, $tipopersona_id, $personactivo_id, $email_verified_at, $iminimo, $cbu, $nrotramite, $patente, $nrocta,
    $actor_referente, $actividad, $caracterdeltitular, $agente_informes_id;
    public $informe_id; // Es el id del area seleccionada que tiene ligados todos los informes del area

    public $listadoinformes,$listadoinformesGenerados,$respuestas,$nombredelinforme;
    public $bancorespuestas =array();
    public $bancopreguntas;

    public $isModalOpen = false;
    public $isModalOpenAdicionales=false;
    public $isModalOpenGestionar=false;

    //Variables de Nuevo informe
    public $ModalNuevoInforme=false;
    public $personalmedico;
    public $anioNuevo, $periodoNuevo, $profesional_id_Nuevo, $nuevo_informe_id;
    // public $mostrarInformesGenerados =false;
    public $mostrarinformeespecifico=false, $informeespecifico;
    public $modalpreguntas=false;

    public $vinculo, $modalidad,$ultimaocupacion,$viviendapropia,$canthijosvarones,$canthijasmujeres, $activo;


    public function render()
    {
        //Busca el id de la empresa relacionada con el usuario que está logueado
        $usuario=EmpresaUsuario::where('user_id','=',Auth::id())->get();
        // dd($usuario[0]['empresa_id']);
        session(['empresa_id' => $usuario[0]['empresa_id']]);
        
        // dd(session('empresa_id'));

        $this->anioNuevo=date("Y");
        $this->tipos_documentos = TiposDocumentos::all();
        $this->estados_civiles = EstadosCiviles::all();
        $this->tipos_de_personas = TipoDePersona::all();
        $this->nacionalidades = Nacionalidad::all();
        $this->localidades = Localidades::all();
        $this->beneficios = Beneficios::all();
        $this->grados_dependencias = GradoDependencia::all();
        $this->escolaridades = Escolaridades::all();
        $this->sexos = Sexo::all();
        $this->person_activos = PersonActivo::all();
        $this->ivas = Iva::all();
        // $this->actores = Empresa::all();
        // $this->actores = Actor::all();
        $this->camas = json_decode(DB::table('cama_habitacions')
            ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
            ->where('habitacions.empresa_id',session('empresa_id'))
            ->orderBy('cama_id')
            ->get(),true);
        // $this->radios = 'Todos';
        if(is_null($this->radios)) { $this->radios='Todos'; $this->actores = Actor::orderby('nombre')->get(); }
            // dd($this->radios);
        return view('livewire.actores.actor-component')->with(['radios'=>$this->radios]);
    }

    public function nuevoInforme() {
        $a= new AgenteInforme;
        $a->agente_id = $this->actor_id;
        $a->informe_id=$this->nuevo_informe_id;
        $a->nroperiodo=$this->periodoNuevo;
        $a->anio=$this->anioNuevo;
        $a->profesional_id=$this->profesional_id_Nuevo;
        $a->empresa_id=session('empresa_id');
        $a->save();
        $preguntas = Pregunta::where('informe_id','=',$this->informe_id)->get();
        foreach($preguntas as $pregunta) {
            $b = new InformeRespuestas;
            $b->agente_informes_id = $a->id;
            $b->preguntas_id = $pregunta->id;
            $b->cantidad = -1;
            $b->descripcion = '';
            $b->fotourl = '';
            $b->save();
        }
        $this->cerrarModalNuevoInforme();
        $this->MostrarInformes($this->nuevo_informe_id);
    }

    public function show($id) {
        $actor = Actor::find($id);
        $this->CargaDatosdelActor($actor);
        $agente = ActorAgente::where('id','=',$this->actor_id)->get(); 
        $this->CargaDatosdelAgente($agente); 

        $this->isModalOpenGestionar=!$this->isModalOpenGestionar;
        // dd('mount');
        // return view('livewire.actores.createactores2');
    }

    public function CargarInforme($informe) {
        $this->listadoinformes = null;
        switch ($informe) {
            case 'Sociales':{ 
                // $this->listadoinformes = Informe::join('areas','areas.id','informes.area_id')
                $this->listadoinformes = Areas::join('informes','areas.id','informes.area_id')
                ->where('areasdescripcion','=','Social')
                ->get();
                if($this->listadoinformes) {
                    $this->informe_id=$this->listadoinformes[0]->id;
                    // dd($this->listadoinformes);
                }
                // $this->informe_id=$informe_id;
                break;
            }
            case 'Medicos':{ 
                // $this->listadoinformes = Informe::join('areas','areas.id','informes.area_id')
                $this->listadoinformes = Areas::join('informes','areas.id','informes.area_id')
                ->where('areasdescripcion','=','Médica')
                ->get();
                if($this->listadoinformes) {
                    $this->informe_id=$this->listadoinformes[0]->id;
                    // dd($this->informe_id);
                }
                //dd($this->informe_id);
                // $this->informe_id=$informe_id;
                break;
            }
        }
        $this->listadoinformesGenerados=null;
    }

    public function MostrarInformes($informe_id) {
        // $this->listadoinformesGenerados = AgenteInforme::all();
        // $this->informe_id=$informe_id;
        $this->listadoinformesGenerados = AgenteInforme::where('informe_id','=',$informe_id)
        ->where('agente_id','=',$this->actor_id)
        ->orderby('anio')->orderby('nroperiodo')->get();
        //  dd($this->listadoinformesGenerados);

        // $this->mostrarInformesGenerados = true;
    }

    public function BuscarDatosDelInforme($informe_id) {

        // $this->respuestas = InformeRespuestas::find($informe_id);
        // $this->respuestas = InformeRespuestas::where('agente_informes_id','=',$informe_id)->get();
        // $this->informeespecifico = InformeRespuestas::join('preguntas','preguntas.id','preguntas_id')
        // ->where('agente_informes_id','=',$informe_id)->get();
        $this->informeespecifico = InformeRespuestas::where('agente_informes_id','=',$informe_id)
        ->join('preguntas','preguntas.id','preguntas_id')
        ->get(['preguntas_id','cantidad','descripcion','agente_informes_id','fotourl','informe_respuestas.id','textopregunta','escala_id']);
        // ->get();

        
        // dd($this->informeespecifico);
        $this->agente_informes_id=$informe_id;
        // $cont = 0;
        // if(count($this->informeespecifico)) { $this->nombredelinforme = Informe::find($this->informeespecifico[0]->informe_id)->nombreinforme; }

        // dd($this->nombredelinforme);

        // foreach($this->respuestas as $respuesta) {
            // $a[$cont]['cantidad'] = $respuesta->cantidad;
            // $this->informeespecifico = Pregunta::find($respuesta->preguntas_id)->get();
            // dd($a[$cont]);
            // $cont++;
        // }
        $this->mostrarinformeespecifico = true;
        // dd($a);
        // dd($this->respuestas->respuesta);
    }

    public function ResponderInforme($informe_id) {
        // dd($this->informe_id);
        // Buscar las preguntas que tendrá el informe
        $informe = Informe::find($this->informe_id);
        $this->bancopreguntas = Pregunta::select('preguntas.id','textopregunta','area_id','escala_id','informe_id','nombreescala','tipodatos','minimo','maximo', 'empresa_id')
        ->where('informe_id','=',$this->informe_id)
        ->join('escalas','escala_id','escalas.id')
        ->get();
        // Iterar las preguntas y según su tipo mostrarla por pantalla
        // dd($this->bancopreguntas);
        // foreach($this->bancopreguntas as $pregunta) {
        //     // $otra = $pregunta;
        //     // $escala = $otra->nombreescala1;
        //     switch ($pregunta->nombreescala) {
        //         case 'Lógica':{ 
        //             $html = $html . '
        //                 <tr>
        //                     <td>
        //                         ' . $pregunta->textopregunta . '
        //                     </td>
        //                     <td class="col-3" style="text-align: center" colspan=2>
        //                         <input class="mr-1" type="checkbox">SI<input class="ml-3 mr-1" type="checkbox">NO
        //                     </td>
        //                 </tr>';
        //                 break;
        //         }
        //         case 'Numérica':{ 
        //             $html = $html . '
        //                 <tr>
        //                     <td>
        //                         ' . $pregunta->textopregunta . '
        //                     </td>
        //                     <td>Cantidad: <input class="mr-1" type="textbox"></td>
        //                 </tr>';
        //                 break;
        //         }
        //         case 'Porcentaje':{ 
        //             $html = $html . '
        //                 <tr>
        //                     <td>
        //                         ' . $pregunta->textopregunta . '
        //                     </td>
        //                     <td>Cantidad porcentaje: <input class="mr-1" type="textbox"></td>
        //                 </tr>';
        //         }
        //     }
        // }
        //     $html = $html . '</table>';
                
            //         $matrizpreguntas[$cont][];
            //     }
            // $cont++;
        // dd($html);
            //     @if($informe->escala_id==2)
            //     <div>
            //         <div>
            //             0 <progress id="file" max="100" value="70" style="height: 10px;vertical-align: inherit;background-color: darkgray; margin-left: 3px; margin-right: 3px; border-radius: 5px"></progress> 100
            //         </div>
            //         <p style="position: relative; top:-9px;font-size: 12px;">70</p>
            //     </div>
            // @endif
        // foreach($bancopreguntas as $pregunta) {
        //     switch ($pregunta->nombreescala) {
        //         case 'Lógica':{ 
        //             $matrizrespuestas[$cont]['informes_id']=$pregunta->informes_id;
        //             $matrizrespuestas[$cont]['preguntas_id']=$pregunta->preguntas_id;
        //             $matrizrespuestas[$cont]['cantidad']=$pregunta->cantidad;
        //             $matrizrespuestas[$cont]['descripcion']=$pregunta->descripcion;
        //         }
        //     }
        // }
        // dd($informe_id);
        //return redirect()->route('modalpreguntas', ['informe_id' => $informe_id]);
        // return redirect('livewire-actores-modalpreguntas');
        $this->modalpreguntas = true;
    }

    public function ResponderInforme1() {
        // Buscar las preguntas que tendrá el informe
        $informe = Informe::find(2);
        $this->bancopreguntas = Pregunta::where('informe_id','=',2)
        ->join('escalas','escala_id','escalas.id')
        ->get();
        $this->modalpreguntas = true;
        return view('livewire.actores.modalpreguntas')->with(['nombredelinforme'=>'INFORME','bancopreguntas'=>$this->bancopreguntas,'temporal'=>1]);
    }

    public function TomarRespuesta($id, $pregunta_id, $respuesta, $descripcion){
        // $temp = array();
        // $temp = array('pregunta'=>$pregunta_id, 'respuesta'=>$respuesta, 'descripcion'=>$descripcion);
        // dd($this->agente_informes_id);
        $a = InformeRespuestas::find($id);
        
        if(!is_null($a)) {
            $a->cantidad = $respuesta;
            $a->save();
        } else
        {   $a = new InformeRespuestas();
            $a->agente_informes_id = $this->agente_informes_id;
            $a->preguntas_id = $pregunta_id;
            if($respuesta==1) { $a->cantidad = $respuesta; } else { $a->cantidad = 0;}
            $a->descripcion = $descripcion;
            $a->save();
        }
        // InformeRespuestas::updateOrCreate(['id' => $id], [
        // $a = new InformeRespuestas();
        // 'agente_informes_id' => $this->agente_informes_id,
        // 'preguntas_id' => $pregunta_id,
        // 'cantidad' => $respuesta,
        // 'descripcion' => $descripcion,
        // ]);
        //dd($a);
        // $a->save();
        // array_push($this->bancorespuestas,$temp);
        // dd($this->bancorespuestas);
        // $this->bancorespuestas[] = $temp;
        $this->BuscarDatosDelInforme($this->agente_informes_id);
    }

    public function Filtrar() {
        switch ($this->radios) {
            case 'Todos': $this->actores = Actor::orderby('nombre')->get(); break;
            case 'Agentes': $this->actores = Actor::where('tipopersona_id','=',1)->orderby('nombre')->get(); break;
            case 'Referentes': $this->actores = Actor::where('tipopersona_id','=',2)->orderby('nombre')->get(); break;
            case 'Personal': $this->actores = Actor::where('tipopersona_id','=',3)->orderby('nombre')->get(); break;
            case 'Proveedores': $this->actores = Actor::where('tipopersona_id','=',4)->orderby('nombre')->get(); break;
            case 'Clientes': $this->actores = Actor::where('tipopersona_id','=',5)->orderby('nombre')->get(); break;
            case 'Vendedores': $this->actores = Actor::where('tipopersona_id','=',6)->orderby('nombre')->get(); break;
            case 'Empresas': $this->actores = Actor::where('tipopersona_id','=',7)->orderby('nombre')->get(); break;
        }
    }
    //     // $this->render();
    // }

    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        $this->tipos_documentos = TiposDocumentos::all();
        $this->estados_civiles = EstadosCiviles::all();
        $this->tipos_de_personas = TipoDePersona::all();
        $this->nacionalidades = Nacionalidad::all();
        $this->localidades = Localidades::all();
        $this->beneficios = Beneficios::all();
        $this->grados_dependencias = GradoDependencia::all();
        $this->escolaridades = Escolaridades::all();
        $this->person_activos = PersonActivo::all();
        $this->camas = json_decode(DB::table('cama_habitacions')
            ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
            ->where('habitacions.empresa_id',session('empresa_id'))
            ->orderBy('cama_id')
            ->get(),true);
        return view('livewire.actores.actor-component')->with('isModalOpen', $this->isModalOpen);
    }

    // Se encarga de los modales 
    //==========================
    public function openModalPopover() { $this->isModalOpen = true; }
    public function closeModalPopover() { $this->isModalOpen = false; }
    public function closeModalInformeEspecifico() { $this->mostrarinformeespecifico = false; }
    public function openModalPopoverAdicionales() { $this->isModalOpenAdicionales = true; }
    public function closeModalPreguntas() { $this->modalpreguntas = false; }
    public function closeModalPopoverAdicionales() { 
        $this->isModalOpenAdicionales = false; 
        $this->reset('vinculo','ultimaocupacion','viviendapropia','canthijosvarones','canthijasmujeres','activo');
    }

    public function abrirModalNuevoInforme($id) { 
        $this->ModalNuevoInforme=true; 
        $this->personalmedico = Actor::where('tipopersona_id','=',3)->get(); 
        $this->nuevo_informe_id = $id; 
    }
    public function cerrarModalNuevoInforme() { $this->ModalNuevoInforme=false; }


    private function resetCreateForm(){
        $this->actor_id = '';
        $this->email = '';
        $this->domicilio = '';
        $this->documento = '';
        $this->tipopersona_id = null ;
        $this->nacionalidad_id = null;
        $this->localidad_id = null ;
        $this->beneficio_id = null ;
        $this->personactivo_id = null ;

    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required', 
            'documento' => 'required|integer',
            'tipodocumento_id' => 'required|integer', 
            // 'nacimiento' => 'required|date',
            // 'estadocivil_id' => 'required|integer',
            // 'sexo_id' => 'required|integer', 
            // 'email' => 'required|email', 
            'tipopersona_id' => 'required|integer', 
            'nacionalidad_id' => 'required|integer',
            'localidad_id' => 'required|integer',
            'beneficio_id' => 'required|integer',
            // 'gradodependencia_id' => 'required|integer', 
            // 'escolaridad_id' => 'required|integer', 
            // 'cama_id' => 'integer', 
            'personactivo_id' => 'required|integer',
        ]);
        //dd($this->personactivo_id);
        $a = actor::updateOrCreate(['id' => $this->actor_id], [
            'nombre' => $this->name, 
            // 'alias' => $this->alias, 
            'domicilio' => $this->domicilio, 
            'documento' =>  $this->documento,
            'tipos_documento' =>  1, //$this->tipodocumento_id, 
            'nacimiento' =>  date(now()), //$this->nacimiento,
            // 'estadocivil_id' =>  $this->estadocivil_id,
            'sexo_id' =>  1, //$this->sexo_id, 
            'email' =>  $this->email, 
            'telefono' => 1111, // $this->telefono, 
            // 'tipopersona_id' =>  $this->tipopersona_id, 
            'nacionalidad_id' =>  $this->nacionalidad_id,
            'localidad_id' =>  $this->localidad_id,
            // 'beneficio_id' =>  $this->beneficio_id,
            'obrasocial_id' =>  $this->beneficio_id,
            // 'gradodependencia_id' =>  $this->gradodependencia_id, 
            'escolaridad_id' =>  1, //$this->escolaridad_id, 
            // 'cama_id' =>  $this->cama_id, 
            'personactivo_id' =>  $this->personactivo_id,
            // 'email_verified_at' => $this->nacimiento,
            'tipopersona_id' => $this->tipopersona_id,
            'empresa_id' => session('empresa_id'),
            'urlfoto' => 'pepe',
            'activo' => 1,
        ]);

        if($this->tipopersona_id==2) {
            $b = new ActorReferente;
            // dd($a->id);
            $b->actor_id = $a->id;
            $b->vinculo = '';
            $b->modalidad = '';
            $b->save();
        }
        $this->actor_id = $b->id;

        session()->flash('message', $this->actor_id ? 'Actor Actualizado/a.' : 'Actor Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $actor = Actor::findOrFail($id);
        $this->id = $id;
        $this->actor_id=$id;
        //$cliente = new empresa;
        //dd($cliente->nombre);
        $this->name = $actor->nombre;
        // $this->alias = $actor->alias;
        $this->domicilio = $actor->domicilio;
        $this->documento = $actor->documento;
        $this->tipodocumento_id = $actor->tipos_documento;
        //$this->tipodocumento_id = $actor->tipodocumento_id;
        $this->nacimiento = $actor->nacimiento;
        $this->estadocivil_id = $actor->estadocivil_id;
        // $this->sexo_id = $actor->sexo_id ;
        $this->email = $actor->email;
        $this->tipopersona_id = $actor->tipopersona_id;
        $this->nacionalidad_id = $actor->nacionalidad_id;
        $this->localidad_id = $actor->localidad_id;
        $this->beneficio_id = $actor->obrasocial_id;
        // $this->gradodependencia_id = $actor->gradodependencia_id ;
        $this->escolaridad_id = $actor->escolaridad_id ;
        // $this->cama_id = $actor->cama_id ;
        // $this->email_verified_at = $actor->email_verified_at;

        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Actor::find($id)->delete();
        session()->flash('message', 'Actor Eliminado.');
    }

    public function agregar($id)
    {
        $actor = Actor::findOrFail($id);
        // dd($actor);
        $this->id = $id; // this->actor_id;
        //$this->actor_id=$this->actor_id;
        
        //$cliente = new empresa;
        // dd($actor->tipopersona_id);
        switch ($actor->tipopersona_id) {
            case 1: { // Agente
                $this->referentes = Actor::where('tipopersona_id','=',2)->get(); 
                $agente = ActorAgente::where('id','=',$this->actor_id)->get(); 
                $this->CargaDatosdelAgente($agente);    
                $this->camas22 = Camas::where('EstadoCama','=',1)->orderby('NroHabitacion')->get();           
                break; 
            }
            case 2: {
                // Referentes
                    $referente = ActorReferente::where('actor_id','=',$id)->get();
                    if($referente->isNotEmpty()) {
                        $this->vinculo = $referente[0]->vinculo;
                        $this->ultimaocupacion = $referente[0]->ultimaocupacion;
                        $this->viviendapropia = $referente[0]->viviendapropia;
                        $this->canthijosvarones = $referente[0]->canthijosvarones;
                        $this->canthijasmujeres = $referente[0]->canthijasmujeres;
                        $this->actor_id = $referente[0]->actor_id;
                        $this->activo = $referente[0]->activo;
                    }
                    break;
                }
            case 3: // Personal
                $personal = ActorPersonal::where('actor_id','=',$this->actor_id)->get();
                if($personal->isNotEmpty()) {
                    $this->modalidad = $personal[0]->modalidad;
                    $this->fingreso = $personal[0]->fingreso;
                    $this->iminimo = $personal[0]->iminimo;
                    $this->cbu = $personal[0]->cbu;
                    $this->nrotramite = $personal[0]->nrotramite;
                    $this->patente = $personal[0]->patente;
                    $this->nrocta = $personal[0]->nrocta;
                    $this->activo = $personal[0]->activo;
                }
                break;
                case 4: //Proveedor
                    // dd($this->actor_id);
                $proveedor = ActorProveedor::where('actor_id','=',$this->actor_id)->get();
                if($proveedor->isNotEmpty()) {
                    $this->iva_id = $proveedor[0]->iva_id;
                }
                break;
                case 5: //Cliente
                    // dd($this->actor_id);
                $cliente = ActorCliente::where('actor_id','=',$this->actor_id)->get();
                if($cliente->isNotEmpty()) {
                    $this->iva_id = $cliente[0]->iva_id;
                }
                break;
                case 6: // Vendedor
                    $vendedor = ActorVendedor::where('actor_id','=',$this->actor_id)->get();
                if($vendedor->isNotEmpty()) {
                    $this->iva_id = $vendedor[0]->iva_id;
                }
                    break;
                case 7: // Empresa
                    $empresa = ActorEmpresa::where('actor_id','=',$this->actor_id)->get();
                if($empresa->isNotEmpty()) {
                    $this->iva_id = $empresa[0]->iva_id;
                    $this->caracterdeltitular = $empresa[0]->caracterdeltitular;
                    $this->actividad = $empresa[0]->actividad;
                }
                    break;
            }

        // Carga Datos del Actor
        
        $this->CargaDatosdelActor($actor);
        $this->openModalPopoverAdicionales();
    }

        
    public function CargaDatosdelActor($actor) {
        $this->actor_id = $actor->id;
        $this->name = $actor->nombre;
        $this->domicilio = $actor->domicilio;
        $this->documento = $actor->documento;
        $this->tipodocumento_id = $actor->TipoDocumento($actor->id)[0]['tipodocumento'];
        $this->sexo_id = $actor->Sexo()[0]['nombresexo'];
        $this->nacionalidad_id = $actor->Nacionalidad()[0]['nacionalidad_descripcion'];
        $this->localidad_id = $actor->Localidad()[0]['localidad_descripcion'];
        $this->beneficio_id = $actor->Beneficio()[0]['descripcionbeneficio'];
        $this->escolaridad_id = $actor->Escolaridad()[0]['escolaridadDescripcion'];
        $this->telefono = $actor->telefono;
        $this->nombreempresa = $actor->Empresa()[0]['name'];
        $this->activo = $actor->activo;
        // dd($this->activo);
        //$this->tipodocumento_id = $actor->tipodocumento_id;
        $this->nacimiento = $actor->nacimiento;
        $this->estadocivil_id = $actor->estadocivil_id;
        $this->email = $actor->email;
        $this->tipopersona_id = $actor->tipopersona_id;
        //$this->cama_id = $actor->cama_id;
        $this->personactivo_id = $actor->personactivo_id;
        $this->email_verified_at = $actor->email_verified_at;
    }

    public function CargaDatosdelAgente($agente) {
        // Datos del Agente
        if($agente->isNotEmpty()) {
            $this->fingreso = $agente[0]->fingreso;
            $this->fegreso = $agente[0]->fegreso;
            $this->peso = $agente[0]->peso_id;
            $this->cama_id = $agente[0]->cama_id;
            $this->alias = $agente[0]->alias;
            if(is_null($agente[0]['grado_dependencia_id'])) $this->gradodependencia='-'; else $this->gradodependencia = GradoDependencia::where('id','=',$agente[0]['grado_dependencia_id'])->get()[0]['gradodependenciaDescripcion'];
            if(is_null($agente[0]->actor_referente)) $this->actor_referente = '-'; else $this->actor_referente = Actor::where('id','=',$agente[0]->actor_referente)->get()[0]['nombre'];
            $this->referentes = Actor::where('tipopersona_id','=',2)->get();

            if(is_null($agente[0]->motivos_egreso_id))  $this->motivosegresos='-'; else $this->motivosegresos = $agente[0]->MotivosEgreso()[0]['motivoegresoDescripcion'];
            // $this->camas = json_decode(DB::table('cama_habitacions')
            // ->join('habitacions', 'habitacions.id', '=', 'cama_habitacions.habitacion_id')
            // ->where('habitacions.empresa_id',session('empresa_id'))
            // ->orderBy('cama_id')
            // ->get(),true);
            $this->camas22 = Camas::where('EstadoCama','=',1)->orderby('NroHabitacion')->get();           
            $this->datossociales_id = $agente[0]->datossociales_id;

            if(!is_null($agente[0]->datossociales_id)) {
                $this->historiadevida = DatosSocial::findOrFail($agente[0]->datossociales_id)->historiadevida;
            } 
            $this->camas22 = Camas::where('EstadoCama','=',1)->orderby('NroHabitacion')->get();           

            // dd($this->historiadevida);
        }        
    }

    public function storeAdicionalActor() {
        switch ($this->tipopersona_id) {
            case 1: // Agente
                $this->validate([
                    'fingreso' => 'required',
                    'peso' => 'integer',
                    // 'referente_id' => 'integer',
                    'cama_id' => 'integer',
                ]);
                $a = ActorAgente::updateOrCreate(['id' => $this->actor_id], [
                'fingreso' => $this->fingreso,
                'fegreso' => $this->fegreso,
                'alias' => $this->alias,
                'peso_id' => $this->peso,
                'actor_id' => $this->actor_id,
                'actor_referente' => $this->referente_id,
                'cama_id' => $this->cama_id,
                'datossociales_id' => null,
                'datosmedicos_id' => null,
                'motivos_egreso_id' => null,
                'grado_dependencia_id' => null,
                'historiadevida_id' => null,
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break;
            case 2: // Referente
                
            $this->validate([
                'vinculo' => 'required',
                // 'modalidad' => 'required', 
                'ultimaocupacion' => 'required', 
                'viviendapropia' => 'required', 
                'canthijosvarones' => 'required', 
                'canthijasmujeres' => 'required', 
                'activo' => 'required', 
            ]);
            // dd($this->actor_id);
            $a = ActorReferente::updateOrCreate(['actor_id' => $this->actor_id], [ //Tener en cuenta que está grabando en la tabla de personas, no de agentes
                'vinculo' => $this->vinculo, 
                'modalidad' => 1, 
                'ultimaocupacion' => $this->ultimaocupacion, 
                'viviendapropia' => $this->viviendapropia, 
                'canthijosvarones' => $this->canthijosvarones, 
                'canthijasmujeres' => $this->canthijasmujeres, 
                'actor_id' => $this->actor_id, 
                'activo' => $this->activo, 
            ]);
            session()->flash('message', 'Se guardaron los datos');
            break;
            case 3: // Personal
                $this->validate([
                    'modalidad' => 'required',
                    'fingreso' => 'required|date', 
                    'iminimo' => 'integer', 
                    'activo' => 'required', 
                ]);
                // DD($this->actor_id);
                $a = ActorPersonal::updateOrCreate(['actor_id' => $this->actor_id], [
                    'modalidad' => $this->modalidad,  
                    'fingreso' => $this->fingreso, 
                    'iminimo' => $this->iminimo, 
                    'cbu' => $this->cbu, 
                    'nrotramite' => $this->nrotramite, 
                    'patente' => $this->patente, 
                    'nrocta' => $this->nrocta,
                    'actor_id' => $this->actor_id, 
                    'activo' => $this->activo, 
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break; 
            case 4:  // Proveedor
                $this->validate([
                    'iva_id' => 'integer',
                ]);
                $a = ActorProveedor::updateOrCreate(['actor_id' => $this->actor_id], [
                    'iva_id' => $this->iva_id,
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break;
            case 5: // Cliente
                $this->validate([
                    'iva_id' => 'integer',
                ]);
                $a = ActorCliente::updateOrCreate(['actor_id' => $this->actor_id], [
                    'iva_id' => $this->iva_id,
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break;
            case 6: // Vendedor
                $this->validate([
                    'iva_id' => 'integer',
                ]);
                $a = ActorVendedor::updateOrCreate(['actor_id' => $this->actor_id], [
                    'iva_id' => $this->iva_id,
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break;
            case 7: // Empresa
                $this->validate([
                    'iva_id' => 'integer',
                ]);
                $a = ActorEmpresa::updateOrCreate(['actor_id' => $this->actor_id], [
                    'iva_id' => $this->iva_id,
                    'actividad' => $this->actividad,
                    'caracterdeltitular' => $this->caracterdeltitular,
                ]);
                session()->flash('message', 'Se guardaron los datos');
                break;
        }

    }
}
