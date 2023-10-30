<?php

namespace Bulbakh\Rafinita\Request;

use Bulbakh\Rafinita\RequestDriver\RequestDriver;
use Bulbakh\Rafinita\RequestDriver\CurlRequestDriver;
use Exception;

class SaleRequest implements Request
{
    protected RequestDriver $driver;

    public function __construct()
    {
        $this->driver = new CurlRequestDriver();
    }

    /**
     * @param string $apiUrl
     * @param array<string, string> $params
     * @return string
     * @throws Exception
     */
    public function send(string $apiUrl, array $params): string
    {
        return $this->driver->send($apiUrl, $params);
    }
}
