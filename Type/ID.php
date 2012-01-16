<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException;

/**
 * Represents the ID Attribute from [XMLSchema]. It represents a name or string that
 * contains no space characters and starts with a letter, or ‘_’. Each ID value MUST be
 * unique within a JDF document and thus uniquely identify the ele­ments that bear them.
 *
 * Note that the ID Attribute definition in [XMLSchema] is more restrictive than the ID
 * Attribute definition in [XML]. [XMLSchema] explicitly forbids the use of ‘:’ in ID.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class ID
{
    protected $value;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    public function setValue($value)
    {
        if (strpos($value, ' ') !== false) {
            throw new InvalidArgumentException('ID values may not contain spaces');
        }
        if (!preg_match('/^[a-zA-z_]/', $value)) {
            throw new InvalidArgumentException('ID values must start with a letter or an underscore');
        }

        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

}
