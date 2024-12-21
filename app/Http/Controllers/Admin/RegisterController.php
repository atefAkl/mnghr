<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {

        $validated = $request->validate([
            'userName' => 'required|string|min:3|max:50|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50'
        ]);


        DB::beginTransaction();
        try {
            // Create admin user
            $admin = Admin::create([
                'name' => ucfirst($request->first_name) . ' ' . ucfirst($request->last_name),
                'userName' => $request->userName,
                'email' => $request->email,
                'password' => Hash::make($validated['password']),
                'status' => 1, // Active by default
                'created_at' => now()
            ]);


            // Create admin profile
            AdminProfile::create([
                'user_id' => $admin->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'created_at' => now()
            ]);

            DB::commit();

            return redirect()->route('admin.auth.login')
                ->with('success', 'Registration successful! Please login.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()
                ->withErrors(['error' => 'An error occurred during registration. Please try again Later.' . $e->getMessage()]);
        }
    }
}
