<?php

/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\Duration;
use Doctrine\OXM\Types\Type;

/**
 * Attributes are encoded as either of the string values "true"
 * or "false". The XML Schema data type boolean values of "1" or "0" are not permitted.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DurationType extends Type
{
    public function getName()
    {
        return 'JDF.Duration';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\Duration $value
     * @return null|string
     */
    public function convertToXmlValue($value)
    {
        if (null === $value) {
            return null;
        }

        return $value->format(Duration::FORMAT);
    }

    /**
     * @param string $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\Duration
     */
    public function convertToPHPValue($value)
    {
        if (null === $value) {
            return null;
        }

        return new Duration($value);
    }
}