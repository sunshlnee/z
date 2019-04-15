<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ForgetPassword;
use Illuminate\Contracts\Mail\Mailer;
use App\Http\Requests\Auth\RegisterRequest;

class ForgotPassportService
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMail(User $user)
    {
    	$user->setPasswordToken();

        $this->mailer->to($user->email)->send(new ForgetPassword($user));
    }

    public function updatePassword(User $user, string $password)
    {
        $user->password = bcrypt($password);
        $user->save();
    }
}
