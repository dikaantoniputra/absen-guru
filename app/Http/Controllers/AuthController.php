<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{

    public function index()
    {
        return view('login.index', ["title" => "Login"]);
    }


    public function login(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Extract credentials from the request
        $credentials = $request->only('username', 'password');
    
        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Check if the user status is active (0)
            if (Auth::user()->status == '0') {
                // Redirect based on user role
                $role = Auth::user()->role;
                if ($role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } 
                elseif ($role === 'yayasan') {
                    return redirect()->route('yayasan.dashboard');
                }
                elseif ($role === 'guru') {
                    return redirect()->route('absen.guru');
                }
                elseif ($role === 'kepala-sekolah') {
                        return redirect()->route('absen.kepsek');
                } else {
                    return redirect()->route('user.dashboard');
                }
            } else {
                // If user is not active, log them out and show an error message
                Auth::logout();
                return redirect()->back()->withInput()->withErrors([
                    'error' => 'Akun Anda Tidak Aktif Harap Hubungi Admin.',
                ]);
            }
        }
    
        // If authentication fails, redirect back with an error message
        return redirect()->back()->withInput()->withErrors([
            'error' => 'Invalid credentials. Please try again.',
        ]);
    }
    
    public function logout()
        {
            Auth::logout();

            return redirect('/login');
        }

        protected function authenticated(Request $request, $user)
        {
            // Periksa role user dan arahkan ke halaman yang sesuai
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } 
            elseif ($user->role === 'yayasan') {
                return redirect()->route('yayasan.dashboard');
            }
            elseif ($user->role === 'guru') {
                return redirect()->route('absen.guru');
            }
            elseif ($user->role === 'kepala-sekolah') {
                    return redirect()->route('absen.kepsek');
            } else {
                return redirect()->route('user.dashboard');
            }
    
            // Default redirect jika tidak ada role yang sesuai
            return redirect('/user-home');
        }


}
