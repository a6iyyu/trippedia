<?php

declare(strict_types=1);

namespace App\Http;

use Vendor\Controller;

class Home extends Controller
{
    public function index(): void
    {
        view('beranda');
    }
}