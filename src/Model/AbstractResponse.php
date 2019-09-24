<?php
/**
 * @package TLH\HorairesCommercesApi\Model
 * User: jdevergnies
 * Date: 24/09/2019
 * Time: 13:02
 */

namespace TLH\HorairesCommercesApi\Model;

class AbstractResponse
{
    const TYPE_ARRAY = 'array';
    const TYPE_STRING = 'string';

    /**
     * @param $answer
     * @return void
     */
    protected function checkAndSet($answer, $name, $type)
    {
        if ($type !== self::TYPE_STRING && $type !== self::TYPE_ARRAY) {
            return;
        }

        $function = 'is_string';
        if (self::TYPE_ARRAY === $type) {
            $function = 'is_array';
        }

        if (isset($answer[$name]) && $function($answer[$name])) {
            $this->{$name} = $answer[$name];
        }
    }
}
