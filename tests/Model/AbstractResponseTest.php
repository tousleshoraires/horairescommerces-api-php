<?php
/**
 * @package Tests\TLH\HorairesCommercesApi\Model
 * User: jdevergnies
 * Date: 24/09/2019
 * Time: 13:08
 */

namespace Tests\TLH\HorairesCommercesApi\Model;

use PHPUnit\Framework\TestCase;
use TLH\HorairesCommercesApi\Model\AbstractResponse;

class AbstractResponseTest extends TestCase
{
    const ANSWER = [
        'array' => ['id' => 1, 'name' => 'testing'],
        'camelString' => 'camelString',
        'snake_string' => 'snake_string'
    ];

    /**
     * @test
     * @group Model
     * @author Julien Devergnies
     */
    public function typeIsString()
    {
        $response = new ResponseTested();

        $response->checkAndSet(self::ANSWER, 'snake_string','string');
        $this->assertEquals($response->snake_string, self::ANSWER['snake_string']);

        $response->checkAndSet(self::ANSWER, 'camelString','string');
        $this->assertEquals($response->camelString, self::ANSWER['camelString']);
    }

    /**
     * @test
     * @group Model
     * @author Julien Devergnies
     */
    public function typeIsArray()
    {
        $response = new ResponseTested();

        $response->checkAndSet(self::ANSWER, 'array','array');
        $this->assertEquals($response->array, self::ANSWER['array']);
    }

    /**
     * @test
     * @group Model
     * @author Julien Devergnies
     */
    public function typeDoesNotMatch()
    {
        $response = new ResponseTested();

        $response->checkAndSet(self::ANSWER, 'array','string');
        $this->assertNull($response->array);

        $response->checkAndSet(self::ANSWER, 'snake_string','array');
        $this->assertNull($response->snake_string);

        $response->checkAndSet(self::ANSWER, 'camelString','array');
        $this->assertNull($response->camelString);
    }
}

class ResponseTested extends AbstractResponse
{
    public $array;
    public $camelString;
    public $snake_string;

    public function checkAndSet($answer, $name, $type)
    {
        return parent::checkAndSet($answer, $name, $type);
    }
}