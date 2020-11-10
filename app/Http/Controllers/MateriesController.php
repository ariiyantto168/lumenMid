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
        return response()->json([
            'materies' => $materi,
            'code' => 200,
            'message' => 'Succesfull'
        ]);
    }

    public function select_id($materies)
    {   
        $mat = Materies::where('idmateries',$materies)->get();
        return response()->json([
            'Materies' => $mat,
            'code' => 200,
            'message' => 'Succesfull'
        ]);
    }
    
    
}
