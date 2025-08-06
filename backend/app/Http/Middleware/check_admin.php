<?php

namespace App\Http\Middleware;

use App\Models\User as ModelsUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class check_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $name = $request->input("name");
        $password = $request->input("password");

        $user = ModelsUser::where('name', $name)->where("is_admin", 1)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found or not admin'], 403);
        }

        if (!Hash::check($password, $user->password)) {
            return response()->json(['message' => 'Incorrect password'], 401);
        }

        return $next($request);
    }
}
