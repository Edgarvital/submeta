<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProponenteController extends Controller
{
    public function index(){

    	return view('proponente.index');
    }
}
