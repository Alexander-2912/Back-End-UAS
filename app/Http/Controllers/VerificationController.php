<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    //
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/mainpage');
    }


    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/mainpage');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
