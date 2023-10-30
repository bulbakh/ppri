<?php

namespace Bulbakh\Rafinita\Helpers;

class RafinitaHelper
{
    public static function generateHash(string $email, string $pass, string $card): string
    {
        return md5(strtoupper(strrev($email) . $pass .
            strrev(substr($card, 0, 6) . substr($card, -4))));
    }
}
