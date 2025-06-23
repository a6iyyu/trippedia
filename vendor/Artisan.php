<?php

declare(strict_types=1);

namespace Vendor;

class Artisan
{
    public static function serve()
    {
        echo "Server sedang berjalan di http://localhost:8000" . PHP_EOL;
        echo "Tekan CTRL + C untuk keluar." . PHP_EOL;
        passthru("php -S localhost:8000 -t public");
    }
}