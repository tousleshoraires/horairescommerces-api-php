<?php

namespace TLH\HorairesCommercesApi;

use GuzzleHttp\Client as GuzzleClient;
use Exception;

class Client
{
    const API_ENDPOINT = 'https://ws.horaires-commerces.fr';
    const API_PATH = '/rest/v3';

    /**
     * string $clientId Id of the client.
     */
    private $clientId;

    /**
     * string $secret Secret key of the client.
     */
    private $secret;

    /**
     * GuzzleClient $httpClient
     */
    protected $httpClient;

    protected $lastStatusCode;
    protected $lastResponse;

    /**
     * Constructor.
     *
     * @param string $clientId
     * @param string $secret
     *
     * @return void
     */
    public function __construct($clientId = null, $secret = null)
    {
        if (empty($secret)) {
            throw new Exception("The secret key is empty.");
        }
        if (empty($clientId)) {
            throw new Exception("The clientId is empty.");
        }

        $this->clientId = $clientId;
        $this->secret = $secret;
    }

    /**
     * Returns the HTTP Client of the class.
     *
     * @return GuzzleHttp\Client
     */
    public function getClient()
    {
        if (empty($this->httpClient)) {
            $this->httpClient = new GuzzleClient([
                'base_uri' => self::API_ENDPOINT,
                'auth' => [$this->clientId, $this->secret]
            ]);
        }
        
        return $this->httpClient;
    }

    /**
     * Make GET requests to the API.
     *
     * @param string $path
     * @param array  $parameters
     *
     * @return array|object
     */
    public function get($path, array $parameters = [])
    {
        $path = $this->normalizePath($path);

        $response = $this
            ->getClient()
            ->request(
                'GET',
                $path,
                [
                    'body' => json_encode($parameters)
                ]
            );

        $this->lastStatusCode = $response->getStatusCode();
        $this->lastResponse = json_decode($response->getBody()->getContents(), true);

        return $this->lastResponse;
    }

    /**
     * Make POST requests to the API.
     *
     * @param string $path
     * @param array  $parameters
     *
     * @return array|object
     */
    public function post($path, array $parameters = [])
    {
        $path = $this->normalizePath($path);

        $response = $this
            ->getClient()
            ->request(
                'POST',
                $path,
                [
                    'headers' => ['Content-Type' => 'application/json'],
                    'body' => json_encode($parameters)
                ]
            );

        $this->lastStatusCode = $response->getStatusCode();
        $this->lastResponse = json_decode($response->getBody()->getContents(), true);

        return $this->lastResponse;
    }

    protected function normalizePath($path)
    {
        return ((preg_match("`^/`", $path)) ? self::API_PATH.$path : $path);
    }
}
