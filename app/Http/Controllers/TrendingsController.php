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
        return response($pop);       
    }

    public function select_populers($populers)
    {   
        $pop = Populers::where('idpopulers',$populers)->get();
        return response($pop);
    }

    public function index_newclass()
    {
        $ncls = Newclass::all();
        return response($ncls);       
    }

    public function select_newclass($newclass)
    {   
        $ncls = Newclass::where('idnewclass',$newclass)->get();
        return response($ncls);
    }

    public function index_careers()
    {
        $car = Careers::all();
        return response($car);       
    }

    public function select_careers($careers)
    {   
        $car = Careers::where('idcareers',$careers)->get();
        return response($car);
    }

    public function index_testimonies()
    {
        $testimonies = Testimonies::all();
        return response($testimonies);       
    }

    public function select_testimonies($testimonies)
    {
        $testimonies = Testimonies::where('idtestimonies', $testimonies)->get();
        return response($testimonies);
    }
   
}
