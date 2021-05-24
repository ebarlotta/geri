<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficios;

class ClsOtrasCosasController extends Controller
{
    public $beneficios;
    public $isModalOpen = false;
    
    public function __invoke(){
        return view('livewire.liveotra')->with('isModalOpen', $this->isModalOpen)->with('beneficios', $this->beneficios);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "pepepe";
        $this->beneficios = Beneficios::all();
        return view('livewire.liveotra')->with('isModalOpen', $this->isModalOpen)->with('beneficios', $this->beneficios);
        //return view('admin.otrascosas.index')->with('isModalOpen', $this->isModalOpen)->with('beneficios', $this->beneficios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->isModalOpen=true;
        return view('livewire.beneficios.crudbeneficios')->with('isModalOpen', $this->isModalOpen)->with('beneficios', $this->beneficios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
