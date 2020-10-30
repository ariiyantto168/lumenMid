<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Materies;

class MateriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $materi = Materies::all();
        return response($materi);
    }

    public function select_id($materies)
    {   
        $mat = Materies::where('idmateries',$materies)->get();
        return response($mat);
    }
    
    
}
