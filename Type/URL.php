<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * Short for URI-reference. Represents a Uniform Resource Identifier (URI) Reference as
 * defined in [RFC3986]. In JDF 1.3 and above, the URI data typed is represented as an
 * Internationalized Resource Identifier (IRI) as defined in [RFC3987].
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class URL
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
