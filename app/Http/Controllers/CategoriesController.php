<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    

    public function index()
    {
        $categories = Categories::all();
        return response()->json([
            'categories' => $categories,
            'code' => 200,
            'message' => 'Succesfull'
        ]);       
    }

    public function select_id($categories)
    {   
        $cat = Categories::where('idcategories',$categories)->get();
        return response()->json([
            'categories' => $cat,
            'code' => 200,
            'message' => 'Succesfull'
        ]);
    }
   
}
