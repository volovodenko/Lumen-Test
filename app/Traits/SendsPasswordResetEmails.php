<?php

declare(strict_types = 1);

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

trait SendsPasswordResetEmails
{
    /**
     * Send a reset link to the given user.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return response()->json(['status' => trans($response)], 200);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }

    /**
     * Validate the email for the given request.
     */
    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
    }

    /**
     * Get the needed authentication credentials from the request.
     *
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('email');
    }
}
