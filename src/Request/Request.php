<?php

namespace Bulbakh\Rafinita\Request;

interface Request
{
    /**
     * @param string $apiUrl
     * @param array<string, string> $params
     * @return string
     */
    public function send(string $apiUrl, array $params): string;
}
