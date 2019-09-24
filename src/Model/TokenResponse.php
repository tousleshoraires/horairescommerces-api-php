<?php
/**
 * @package TLH\HorairesCommercesApi\Model
 * User: jdevergnies
 * Date: 24/09/2019
 * Time: 13:02
 */

namespace TLH\HorairesCommercesApi\Model;

class TokenResponse extends AbstractResponse
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var array
     */
    protected $user;

    /**
     * @var string
     */
    protected $expiresIn;

    /**
     * @param array $answer
     */
    public function __construct($answer)
    {
        $this->checkAndSet($answer, 'token', 'string');
        $this->checkAndSet($answer, 'user', 'array');
        $this->checkAndSet($answer, 'expiresIn', 'string');
    }

    /**
     * @return string|null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return array|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string|null
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }
}
