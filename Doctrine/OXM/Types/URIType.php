<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\ConversionException;
use RDF\JobDefinitionFormatBundle\Type\URI;
use Doctrine\OXM\Types\Type;

/**
 * A URI is represented identically to the XML Schema type: anyURI.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class URIType extends Type
{
    public function getName()
    {
        return 'JDF.URI';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\URI $range
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($range)
    {
        if ($range === null) {
            return null;
        }

        if (!$range instanceof URI) {
            throw ConversionException::conversionFailed($range, $this->getName());
        }

        return (string) $range->getValue();
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\URI
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        return new URI($value);
    }
}