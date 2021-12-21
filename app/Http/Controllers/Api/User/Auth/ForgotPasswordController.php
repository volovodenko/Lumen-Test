<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Traits\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
}
