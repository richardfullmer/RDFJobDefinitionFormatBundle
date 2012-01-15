<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * Corresponds to IEEE double-precision 64-bit floating point type. It includes the
 * infinity limit tokens INF and -INF, but does not allow the not a number token NaN.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class Double
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
            $this->value = (float) $value;
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
