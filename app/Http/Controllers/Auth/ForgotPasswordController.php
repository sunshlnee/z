<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Auth\ForgotPassportService;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public $service;

    public function __construct(ForgotPassportService $service)
    {
        $this->middleware('guest');
        $this->service = $service;

    }

    public function showForgotForm()
    {
        return view('auth.passwords.email'); 
    }

    public function showResetForm($token)
    {
        return view('auth.passwords.reset', compact('token')); 
    }

    public function sendToEmail(Request $request)
    {
        if (!$user = User::where('email', $request->email)->first()) {

            return redirect()->back()
                ->with('error', 'Пользователь с такой почтой не зарегистрирован.');
        }

        $this->service->sendMail($user);

        return redirect()->back()
            ->with('success', 'Проверьте почту, что бы завершить сброс пароля!');
    }

    public function update(Request $request)
    {
        if (!$user = User::where('password_token', $request->token)->first()) {

            return redirect()->route('password.forgot')
                ->with('error', 'Ваша ссылка не действительна.');
        }

        try {

            $this->service->updatePassword($user, $request->password);

            return redirect()->route('login')
                ->with('success', 'Ваш пароль сброшен.');

        } catch (\DomainException $e) {
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }
}
