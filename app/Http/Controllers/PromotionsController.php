<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Discounts;
use App\Models\Kupons;
use Image;
use File;


class PromotionsController extends Controller
{
    

    public function index_discounts()
    {
        $dis = Discounts::all();
        return response($dis);       
    }

    public function select_discounts($discounts)
    {   
        $dis = Discounts::where('iddiscounts',$discounts)->get();
        return response($dis);
    }

    public function index_kupons()
    {
        $kup = Kupons::all();
        return response($kup);       
    }

    public function select_kupons($kupons)
    {   
        $kup = Kupons::where('idkupons',$kupons)->get();
        return response($kup);
    }
   
}
