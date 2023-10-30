<?php

namespace Bulbakh\Rafinita;

use Bulbakh\Rafinita\Helpers\RafinitaHelper;
use Bulbakh\Rafinita\Request\SaleRequest;
use Exception;

class Client
{
    protected string $clientKey;
    protected string $email;
    protected string $pass;

    /**
     * @param string $clientKey
     * @param string $email
     * @param string $pass
     */
    public function __construct(string $clientKey, string $email, string $pass)
    {
        $this->clientKey = $clientKey;
        $this->email = $email;
        $this->pass = $pass;
    }

    /**
     * @param string $apiUrl
     * @param string $action
     * @param array<string, string> $params
     * @return string
     * @throws Exception
     */
    public function doRequest(string $apiUrl, string $action, array $params): string
    {
        $hash = RafinitaHelper::generateHash($this->email, $this->pass, $params['card_number']);

        $params['action'] = $action;
        $params['hash'] = $hash;
        $params['payer_email'] = $this->email;
        $params['client_key'] = $this->clientKey;

        $request = match ($action) {
            'SALE' => new SaleRequest(),
            default => throw new Exception('ERROR request: Not Implemented'),
        };

        return $request->send($apiUrl, $params);
    }
}
