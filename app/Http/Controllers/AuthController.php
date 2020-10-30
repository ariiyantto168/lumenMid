<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:15',
            'role' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6'
        ]);
            
        $name = $request->input("name");
        $role = $request->input("role");
        $email = $request->input("email");
        $password = $request->input("password");
 
        $hashPwd = Hash::make($password);
 
        $data = [
            "name" => $name,
            "role" => $role,
            "email" => $email,
            "password" => $hashPwd
        ];
 
 
 
        if (User::create($data)) {
            $out = [
                "message" => "register_success",
                "code"    => 200,
            ];
        } else {
            $out = [
                "message" => "vailed_regiser",
                "code"   => 404,
            ];
        }
 
        return response()->json($out);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {		
            $login = "Invalid username or password";
            return response()->json([
                'login' => $login,
                'message' => 'Unauthorized'
            ], 401);
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        // auth()->logout();
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);

    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function me()
    {
        return response()->json(auth()->user());
    }
}