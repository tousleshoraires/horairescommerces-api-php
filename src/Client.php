<?php

namespace TLH\HorairesCommercesApi;

use GuzzleHttp\Client as GuzzleClient;
use Exception;
use TLH\HorairesCommercesApi\Model\TokenResponse;

class Client
{
    const API_ENDPOINT = 'https://ws.horaires-commerces.fr';
    const API_PATH = '/api/v3';

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
     * @param string $clientId
     * @param string $secret
     * @return void
     * @throws Exception
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
     * @return GuzzleClient
     */
    public function getClient()
    {
        if (empty($this->httpClient)) {
            $this->httpClient = new GuzzleClient([
                'base_uri' => self::API_ENDPOINT
            ]);
        }

        return $this->httpClient;
    }

    /**
     * Make GET requests to the API.
     *
     * @param string $path
     * @param string $token
     * @param array $parameters
     *
     * @return array|object
     */
    public function get($path, $token, $parameters = [])
    {
        if (empty($token)) {
            throw new \LogicException('The token is missing.');
        }

        $path = $this->normalizePath($path);

        $arguments = [
            'headers' => [
                'Authorization' => 'Bearer '.$token
            ],
            'query' => $parameters
        ];

        return $this->call('GET', $path, $arguments);
    }

    /**
     * Make POST requests to the API.
     *
     * @param string $path
     * @param string $token
     * @param array $parameters
     *
     * @return array|object
     */
    public function post($path, $token, $parameters = [])
    {
        if (empty($token)) {
            throw new \LogicException('The token is missing.');
        }

        $path = $this->normalizePath($path);

        $arguments = [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => $parameters
        ];

        /*
         * Adding the Auth for Oauth request
         */
        if (preg_match("`/tokens`", $path)) {
            return $this->authenticate();
        }

        return $this->call('POST', $path, $arguments);
    }

    /**
     * Authenticate the user with the credentials received in the constructor.
     *
     * @return TokenResponse
     */
    public function authenticate()
    {
        $arguments = [
            'headers' => ['Content-Type' => 'application/json'],
            'auth' => [$this->clientId, $this->secret]
        ];

        $answer = $this->call('POST', self::API_PATH.'/tokens', $arguments);

        return new TokenResponse($answer);
    }

    /**
     * @deprecated Use the authenticate($path) method instead.
     *
     * @param string $path
     * @param array  $parameters
     *
     * @return array|object
     */
    public function oauth($path, array $parameters = [])
    {
        return $this->authenticate();
    }

    /**
     * @param string $path
     * @param array $arguments
     * @return array|object
     */
    protected function call($method, $path, $arguments)
    {
        $response = $this->getClient()->request($method, $path, $arguments);

        $this->lastStatusCode = $response->getStatusCode();
        $this->lastResponse = json_decode($response->getBody()->getContents(), true);

        return $this->lastResponse;
    }

    protected function normalizePath($path)
    {
        return ((preg_match("`^/(?!api)`", $path)) ? self::API_PATH.$path : $path);
    }
}
