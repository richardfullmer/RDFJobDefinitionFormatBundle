<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException;

/**
 * Represents the NMTOKEN Attribute type from [XML]. It represents
 * a name or string that contains no space charac­ters.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class NMTOKEN
{
    protected $value;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    public function setValue($value)
    {
        if (strpos($value, ' ') !== false) {
            throw new InvalidArgumentException('NMTOKEN values may not contain spaces');
        }

        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

}
