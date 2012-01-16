<?php

/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\Type;
use Doctrine\OXM\Types\ConversionException;
use RDF\JobDefinitionFormatBundle\Type\LabColor;

/**
 * LabColors are primitive data types and are encoded as a list of three numbers
 * (as doubles) separated by whitespace in the sequence: “L a b”
 *
 * @author Richard Fullme <richardfullmer@gmail.com>
 */
class LabColorType extends Type
{
    public function getName()
    {
        return 'JDF.LabColor';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\LabColor $color
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($color)
    {
        if ($color === null) {
            return null;
        }

        if (!$color instanceof LabColor) {
            throw ConversionException::conversionFailed($color, $this->getName());
        }

        return implode(' ', array(
            $color->getL(),
            $color->getA(),
            $color->getB(),
        ));
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\LabColor
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        $values = explode(' ', $value);

        if (!is_array($values)) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        return new LabColor($values[0], $values[1], $values[2]);
    }
}