<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\ConversionException;
use RDF\JobDefinitionFormatBundle\Type\RegExp;
use Doctrine\OXM\Types\Type;

/**
 * It is represented identically to the XML Schema type: normalizeString
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class RegExpType extends Type
{
    public function getName()
    {
        return 'JDF.RegExp';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\RegExp $range
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($range)
    {
        if ($range === null) {
            return null;
        }

        if (!$range instanceof RegExp) {
            throw ConversionException::conversionFailed($range, $this->getName());
        }

        return (string) $range->getValue();
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\RegExp
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        return new RegExp($value);
    }
}