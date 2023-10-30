<?php

namespace Bulbakh\Rafinita\RequestDriver;

use Exception;

class CurlRequestDriver implements RequestDriver
{
    /**
     * @param string $apiUrl
     * @param array<string, string> $params
     * @return string
     * @throws Exception
     */
    public function send(string $apiUrl, array $params): string
    {
        $cURL = curl_init();

        curl_setopt($cURL, CURLOPT_URL, $apiUrl);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_POST, true);
        curl_setopt($cURL, CURLOPT_POSTFIELDS, $params);

        $response = curl_exec($cURL);

        curl_close($cURL);

        if (curl_errno($cURL)) {
            throw new Exception('ERROR cURL: ' . curl_error($cURL));
        }

        if ($response === false || $response === true) {
            throw new Exception('cURL request did not return a valid response');
        }

        return $response;
    }
}
