<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\DateTime;
use Doctrine\OXM\Types\ConversionException;
use Doctrine\OXM\Types\Type;

/**
 * It is represented identically to the XML Schema type: date
 *
 * @author Richard Fullmer <richard.fullmer@gmail.com>
 */
class DateType extends Type
{
    const FORMAT = "Y-m-d";

    public function getName()
    {
        return 'JDF.Date';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\DateTime $date
     * @return null
     */
    public function convertToXmlValue($date)
    {
        return ($date !== null) ? $date->format(static::FORMAT) : null;
    }

    /**
     * @param $value
     * @return \RDF\JobDefinitionFormatBundle\Type\DateTime|null
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        $val = new DateTime($value);
        if (!$val) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        return $val;
    }
}