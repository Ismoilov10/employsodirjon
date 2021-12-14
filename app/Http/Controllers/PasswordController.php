<?php

namespace App\Http\Controllers;

use App\Services\Password\PasswordResets;

class PasswordController extends ApiController
{
use PasswordResets;

public function __construct()
    {
    $this->broker = 'users';
    }
}
