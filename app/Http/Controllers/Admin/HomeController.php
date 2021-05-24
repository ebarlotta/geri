<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{

    public $isModalOpen=false;
    public $beneficios=false;

    public function index()
    {
        return view('admin.index')->with('isModalOpen', $this->isModalOpen)->with('beneficios', $this->beneficios);
    }
}
