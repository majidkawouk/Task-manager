<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Controller
{
    use HasApiTokens,HasFactory,Notifiable;
    
    public function showUsers(){
     $user = ModelsUser::all();
        return $user;
    }
   public function register(Request $request)
{
    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');

    $user = ModelsUser::create([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password), 
    ]);

    return response()->json([
        'message' => 'User registered successfully!',
        'user' => $user,
    ]);
}


    public function showUserbyid($id){
     $user = ModelsUser::find($id);
        return response()->json($user);
    }

   public function login(Request $request)
{
    $name = $request->input('name');
    $password = $request->input('password');

    $user = ModelsUser::where('name', $name)->first();

    if (! $user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    if (! Hash::check($password, $user->password)) {
        return response()->json(['message' => 'Incorrect password'], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'message' => 'User logged in successfully!',
        'token' => $token,
        'user' => $user
    ]);
}




}
