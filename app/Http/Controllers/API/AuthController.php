<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name"      => "required|string|max:100",
            "firstname" => "required|string|max:100",
            "email"     => "required|unique:users",
            "password"  => "required|min:8",
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name'      => $request->name,
            'firstName' => $request->firstname,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
         ]);

        //  event(new Registered($user));  

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }


    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['name' =>$user->name,'access_token' => $token, 'token_type' => 'Bearer', 'id_user' => $user->id]);
    }




    public function loginAdmin(Request $request)
    {   
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized_credential'], 401);
        }D

        if(Auth::user()->role_id !== 2) {
            return response()
                ->json(['message' => 'Unauthorized_role'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();


        return redirect()->intended('welcome');
    }

    // method for user logout and delete token
    public function logout(Request $request)

    {    
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}