<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * Represents a regular expression as defined in [XMLSchema].
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class RegExp
{
    protected $value;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

}
