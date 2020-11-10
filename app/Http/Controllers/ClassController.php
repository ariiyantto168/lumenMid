<?php
namespace App\Http\Controllers;
use App\Models\Classes;
use App\Models\SubClass;
use App\Models\Hilights;

class ClassController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index()
    {
        $class = Classes::all();
        return response()->json([
                'class' => $class,
                'code' => 200,
                'message' => 'ok'
            ]);

    }

    public function classdetail($class)
    {
        $classdetail = Classes::with([
                            'subclass' => function($sub){
                                $sub->with('materies');
                            }
                        ])
                        ->where('idclass',$class)
                        ->first();
        
        return response()->json([
            'classdetail' => $classdetail,
            'code' => 200,
            'message' => 'ok'
        ]);

    }

    public function select_class($classes)
    {   
        $cls = Classes::where('idclass',$classes)->get();
        return response()->json([
            'Class' => $cls,
            'code' => 200,
            'message' => 'Succesfull'
        ]);
    }

    public function index_subclass()
    {
        $subclas = Subclass::all();
        return response()->json([
            'subclass' => $subclas,
            'code' => 200,
            'message' => 'Succesfull'
        ]);
    }

    public function select_subclass($subclass)
    {   
        $sub = Subclass::where('idsubclass',$subclass)->get();
        return response()->json([
            'subclass' => $sub,
            'code' => 200,
            'message' => 'Succesfull'
        ]);
    }

    public function index_hilights()
    {
        $hil = Hilights::all();
        return response()->json([
            'hilights' => $hil,
            'code' => 200,
            'message' => 'Succesfull'
        ]);
    }

    public function select_hilights($hilights)
    {   
        $hil = Hilights::where('idhilights',$hilights)->get();
        return response()->json([
            'hilights' => $hil,
            'code' => 200,
            'message' => 'Succesfull'
        ]);
    }
}