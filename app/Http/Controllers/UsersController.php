<?php

namespace App\Http\Controllers;
use App\Models\Userprofiles;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index_profile()
    {
        $pro = Userprofiles::all();
        return response($pro);
    }

    public function select_profiles($usr)
    {   
        $user= Userprofiles::where('iduserprofiles',$usr)->get();
        return response($user);
    }

    public function create_save(Request $request)
    {
        $saveUser = new Userprofiles;
        $saveUser->idusers = $request->input('idusers');
        $saveUser->firstname = $request->input('firstname');
        $saveUser->lastname = $request->input('lastname');
        $saveUser->tempatlahir = $request->input('tempatlahir');
        $saveUser->date_born = $request->input('date_born');
        $saveUser->jobrole = $request->input('jobrole');
        $saveUser->address = $request->input('address');
        $saveUser->save();
        return response('Success');
    }


   
}
