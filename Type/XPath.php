<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * Represents an XPath expression. [XPath]
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class XPath
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
