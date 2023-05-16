<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;
use App\Models\Menu;

class MenuComponent extends Component
{
    public $isModalOpen = false;
    public $isModalOpenGestionar = false;
    public $menu, $menu_id;
    public $menues, $nombremenu, $menuactivo, $tiempopreparacion;

    public $empresa_id;

    public function render()
    {
        $this->empresa_id=session('empresa_id');
        $this->menues = Menu::where('empresa_id', $this->empresa_id)->get();
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
        //dd($menu);
        $this->menu = $menu;
        return view('livewire.menu.gestionarmenu')->with('isModalOpen', $this->isModalOpen)->with('menu', $menu);
    }

    public function openModalPopoverGestionar()
    {
        $this->isModalOpenGestionar = true;
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
}
