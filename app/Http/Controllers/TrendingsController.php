<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Populers;
use App\Models\Newclass;
use App\Models\Careers;
use App\Models\Testimonies;
use Image;
use File;


class TrendingsController extends Controller
{
    

    public function index_populers()
    {
        $pop = Populers::all();
        return response()->json([
            'Class Populers' => $pop,
            'code' => 200,
            'message' => 'Succesfull'
        ]);   
    }

    public function select_populers($populers)
    {   
        $pop = Populers::where('idpopulers',$populers)->get();
        return response()->json([
            'Class Populers' => $pop,
            'code' => 200,
            'message' => 'Succesfull'
        ]); 
    }

    public function index_newclass()
    {
        $ncls = Newclass::all();
        return response()->json([
            'New Class' => $ncls,
            'code' => 200,
            'message' => 'Succesfull'
        ]);       
    }

    public function select_newclass($newclass)
    {   
        $ncls = Newclass::where('idnewclass',$newclass)->get();
        return response()->json([
            'New Class' => $ncls,
            'code' => 200,
            'message' => 'Succesfull'
        ]);
    }

    public function index_careers()
    {
        $car = Careers::all();
        return response()->json([
            'Career Ready Program' => $car,
            'code' => 200,
            'message' => 'Succesfull'
        ]);     
    }

    public function select_careers($careers)
    {   
        $car = Careers::where('idcareers',$careers)->get();
        return response()->json([
            'Career Ready Program' => $car,
            'code' => 200,
            'message' => 'Succesfull'
        ]);
    }

    public function index_testimonies()
    {
        $test = Testimonies::all();
        return response()->json([
            'Testimoni User' => $test,
            'code' => 200,
            'message' => 'Succesfull'
        ]);       
    }

    public function select_testimonies($testimonies)
    {
        $test = Testimonies::where('idtestimonies', $testimonies)->get();
        return response()->json([
            'Testimoni User' => $test,
            'code' => 200,
            'message' => 'Succesfull'
        ]);
    }
   
}
