<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\ConversionException;
use RDF\JobDefinitionFormatBundle\Type\ID;
use Doctrine\OXM\Types\Type;

/**
 * It is represented identically to the XML Schema type: ID
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class IDType extends Type
{
    public function getName()
    {
        return 'JDF.ID';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\ID $range
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($range)
    {
        if ($range === null) {
            return null;
        }

        if (!$range instanceof ID) {
            throw ConversionException::conversionFailed($range, $this->getName());
        }

        return (string) $range->getValue();
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\ID
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        return new ID($value);
    }
}