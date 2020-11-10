<?php

namespace App\Http\Controllers;
use App\Models\Whislists;
use App\Models\Classes;
use Illuminate\Http\Request;


class WhislistsController extends Controller
{
    

    public function index()
    {
        $whis = Whislists::all();
        return response()->json([
                'whislists' => $whis,
                'code' => 200,
                'message' => 'ok'
            ]);
    }

    public function select_whislists($whislists)
    {
        $whis = Whislists::where('idwhislists',$whislists)->get();
        return response()->json([
            'whislists' => $whis,
            'code' => 200,
            'message' => 'Succesfully'
        ]);
    }

    public function create_save(Request $request)
    {
        $saveWhislists = new Whislists;
        $saveWhislists->idclass = $request->input('idclass');
        $saveWhislists->save();
        return response()->json([
            'whislists' => $saveWhislists,
            'code' => 200,
            'message' => 'Succesfully Add Whislists Class'
        ]);
    }
   
}
