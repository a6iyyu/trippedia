<?php

declare(strict_types=1);

namespace App\Http;

use Vendor\Controller;

class Auth extends Controller
{
    public function login(): void
    {
        view('masuk');
    }

    public function register(): void
    {
        view('daftar');
    }
}