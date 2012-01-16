<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException;

/**
 * IDREF Represents the IDREF Attribute from [XMLSchema]. For a valid XML-document,
 * an element with the ID value specified in IDREF MUST be present in the scope of the document.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class IDREF
{
    protected $value;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    public function setValue($value)
    {
        if (strpos($value, ' ') !== false) {
            throw new InvalidArgumentException('IDREF values may not contain spaces');
        }
        if (!preg_match('/^[a-zA-z_]/', $value)) {
            throw new InvalidArgumentException('IDREF values must start with a letter or an underscore');
        }

        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

}
