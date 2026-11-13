<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function verifyCode(Request $request)
    {
        $adminCode = config('app.admin_registration_code');

        if (filled($adminCode) && hash_equals((string) $adminCode, (string) $request->code)) {

            session([
                'admin_code_verified' => true
            ]);

            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid access code.'
        ], 401);
    }

    public function showRegister()
    {
        return view('admin.register');
    }

        
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $isAdmin = false;

        // If trying admin registration
        if ($request->is_admin == 1) {

            if (!session('admin_code_verified')) {
                return back()->withErrors([
                    'admin' => 'Admin verification required.'
                ]);
            }

            $isAdmin = true;
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $isAdmin,
        ]);

        session()->forget('admin_code_verified');

        Auth::login($user);

        return $isAdmin
            ? redirect('/admin/dashboard')->with('success', 'Admin account created.')
            : redirect('/home')->with('success', 'Account created successfully.');
    }

}