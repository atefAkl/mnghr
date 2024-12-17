<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\Admin;

class PasswordResetController extends Controller
{
    /**
     * Display the password reset request form.
     *
     * @return \Illuminate\View\View
     */
    public function showForgotForm()
    {
        return view('admin.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
        ], [
            'email.exists' => 'We could not find this email in our records.'
        ]);

        // Generate reset token
        $admin = Admin::where('email', $request->email)->first();
        $token = Str::random(64);

        \DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Hash::make($token),
            'created_at' => now()
        ]);

        // Send email with reset link
        $resetLink = route('password.reset', $token);
        // TODO: Send email with reset link

        return back()->with('success', 'Password reset link has been sent to your email.');
    }

    /**
     * Display the password reset form.
     *
     * @param  string  $token
     * @return \Illuminate\View\View
     */
    public function showResetForm($token)
    {
        return view('admin.auth.reset-password', ['token' => $token]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $updatePassword = \DB::table('password_resets')
            ->where([
                'email' => $request->email,
            ])
            ->first();

        if (!$updatePassword || !Hash::check($request->token, $updatePassword->token)) {
            return back()->withErrors(['email' => 'Invalid token!']);
        }

        $admin = Admin::where('email', $request->email)->first();
        $admin->update(['password' => Hash::make($request->password)]);

        \DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect()->route('admin.auth.login')
            ->with('success', 'Your password has been changed successfully!');
    }
}
