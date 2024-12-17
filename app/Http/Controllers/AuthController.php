<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Sprawdzenie, czy użytkownik istnieje
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password.',
            ], 401);
        }

        // Zwrot informacji o sukcesie logowania
        return response()->json([
            'success' => true,
            'message' => 'Login successful!',
            'user' => $user->only(['id', 'email']),
        ]);
    }
}
