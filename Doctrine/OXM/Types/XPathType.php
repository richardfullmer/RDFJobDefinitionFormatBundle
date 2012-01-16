<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\ConversionException;
use RDF\JobDefinitionFormatBundle\Type\XPath;
use Doctrine\OXM\Types\Type;

/**
 * It is represented identically to the XML Schema type: normalizeString
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class XPathType extends Type
{
    public function getName()
    {
        return 'JDF.XPath';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\XPath $range
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($range)
    {
        if ($range === null) {
            return null;
        }

        if (!$range instanceof XPath) {
            throw ConversionException::conversionFailed($range, $this->getName());
        }

        return (string) $range->getValue();
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\XPath
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        return new XPath($value);
    }
}