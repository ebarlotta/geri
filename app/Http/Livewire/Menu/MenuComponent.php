<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Ingredientes;
use App\Models\Menuingrediente;

class MenuComponent extends Component
{
    public $isModalOpen = false;
    public $isModalOpenGestionar = false;
    public $menu, $menu_id;
    public $menues, $nombremenu, $menuactivo, $tiempopreparacion;
    public $ingredientesdelmenu, $ingredientes, $ingredienteagestionar, $cantidad; 
    
    public $empresa_id;
    
    public function render()
    {
        $this->empresa_id=session('empresa_id');
        $this->menues = Menu::where('empresa_id', $this->empresa_id)->orderby('nombremenu')->get();
        $this->ingredientes = Ingredientes::where('empresa_id', $this->empresa_id)->orderby('nombreingrediente')->get();
        return view('livewire.menu.menu-component',['datos'=> Menu::where('empresa_id', $this->empresa_id)->paginate(3),])->extends('layouts.adminlte');
    }

    public function create()
    {
        $this->resetCreateForm();   
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.menu.createmenu')->with('isModalOpen', $this->isModalOpen)->with('menu', $this->menu);
    }

    public function show($id)
    {
        $this->openModalPopoverGestionar();
        $menu = Menu::where('id',$id)->get();
        $this->menu = $menu;
        $this->menu_id = $id;
        //$this->ingredientes = Ingredientes::all();
        $this->ingredientesdelmenu = Ingredientes::where('menu_id',$id)
        ->where('ingredientes.empresa_id',session('empresa_id'))
        ->join('menuingredientes','ingredientes.id','=','menuingredientes.ingrediente_id')
        ->join('unidads','ingredientes.unidad_id','=','unidads.id')
        ->get();
        // $this->ingredientesdelmenu = Menuingrediente::where('menu_id',$id)
        // ->join('ingredientes','ingredientes.id','=','menuingredientes.ingrediente_id')
        // ->join('ingredientes','ingredientes.unidad_id','=','unidads.id')
        // ->get();
        //dd($this->ingredientesdelmenu);

        return view('livewire.menu.gestionarmenu')->with('isModalOpen', $this->isModalOpen)->with('menu', $menu);
    }

    
    public function openModalPopoverGestionar()
    {
        $this->isModalOpenGestionar = true;
    }

    public function closeModalPopoverGestionar()
    {
        $this->isModalOpenGestionar = false;
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
        // $this->isModalOpenGestionar = false;
    }

    private function resetCreateForm(){
        $this->menu_id = '';
        $this->tiempopreparacion = '';
        $this->menuactivo = '';
        $this->nombremenu = '';
    }
    
    public function store()
    {
        $this->validate([
            'nombremenu' => 'required',
        ]);
        Menu::updateOrCreate(['id' => $this->menu_id], [
            'nombremenu' => $this->nombremenu,
            'tiempopreparacion' => $this->tiempopreparacion,
            'menuactivo' => $this->menuactivo,
            'empresa_id' =>$this->empresa_id,
        ]);

        session()->flash('message', $this->menu_id ? 'Menu Actualizadao.' : 'Menu Creadao.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $this->id = $id;
        $this->menu_id=$id;
        $this->nombremenu = $menu->nombremenu;
        $this->tiempopreparacion = $menu->tiempopreparacion;
        $this->menuactivo = $menu->menuactivo;
        
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Menu::find($id)->delete();
        session()->flash('message', 'Menu Eliminadao.');
    }

    public function AgregarElementoAlMenu() {
        // dd($this->cantidad);
        //Si Cantidad es numerico, si es positivo, si no es nulo
        $this->validate([
            'cantidad' => 'required|min:0.00001|numeric',
            'ingredienteagestionar' => 'required|unique:menuingredientes,ingrediente_id,menu_id',
        ]);
        if(is_null($this->ingredienteagestionar)) {
            session()->flash('message', 'Debe seleccionar un ingrediente');
            // dd($this->menu_id);
        } else {
            Menuingrediente::create([
                'menu_id' => $this->menu_id,
                'ingrediente_id' => $this->ingredienteagestionar,
                'cantidad' => $this->cantidad,
            ]);
            // $this->show($this->menu_id);
            // $this->mount();
            $this->ingredientesdelmenu = Ingredientes::where('menu_id',$this->menu_id)
        ->where('ingredientes.empresa_id',session('empresa_id'))
        ->join('menuingredientes','ingredientes.id','=','menuingredientes.ingrediente_id')
        ->join('unidads','ingredientes.unidad_id','=','unidads.id')
        ->get();
            session()->flash('message', 'Se agregó el ingrediente');
        }
    }

    public function habilitar($id,$estado)
    {
        $menu = Menu::find($id);
        if($estado) { $menu->menuactivo = 0; } else { $menu->menuactivo = 1; }
        $menu->save();
    }
}
