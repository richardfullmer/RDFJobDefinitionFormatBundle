<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * Represents numerical integer values with tokens for representing infinity limits.
Implementation note: Except where explicitly noted otherwise, integers are not expected to
 * exceed a value that can be represented as signed 32 bits.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class Integer
{
    const POSITIVE_INFINITY = 'INF';
    const NEGATIVE_INFINITY = '-INF';

    protected $value;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    public function setValue($value)
    {
        if (self::POSITIVE_INFINITY == $value || self::NEGATIVE_INFINITY == $value) {
            $this->value = $value;
        } else {
            $this->value = (int) $value;
        }
    }

    public function getValue()
    {
        return $this->value;
    }

    public function isInfinity()
    {
        return self::POSITIVE_INFINITY == $this->value;
    }

    public function isNegativeInfinity()
    {
        return self::NEGATIVE_INFINITY == $this->value;
    }
}
