<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\ConversionException;
use RDF\JobDefinitionFormatBundle\Type\URL;
use Doctrine\OXM\Types\Type;

/**
 * A URL is represented identically to the XML Schema type: anyURI.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class URLType extends Type
{
    public function getName()
    {
        return 'JDF.URL';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\URL $range
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($range)
    {
        if ($range === null) {
            return null;
        }

        if (!$range instanceof URL) {
            throw ConversionException::conversionFailed($range, $this->getName());
        }

        return (string) $range->getValue();
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\URL
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        return new URL($value);
    }
}