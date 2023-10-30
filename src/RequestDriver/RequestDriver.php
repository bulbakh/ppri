<?php

namespace Bulbakh\Rafinita\RequestDriver;

interface RequestDriver
{
    /**
     * @param string $apiUrl
     * @param array<string, string> $params
     * @return string
     */
    public function send(string $apiUrl, array $params): string;
}
