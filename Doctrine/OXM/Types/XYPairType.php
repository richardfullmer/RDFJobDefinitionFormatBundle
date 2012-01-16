<?php

/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\Type;
use Doctrine\OXM\Types\ConversionException;
use RDF\JobDefinitionFormatBundle\Type\XYPair;

/**
 * XYPair Attributes are primitive data types and are encoded as a string of two
 * numbers, separated by whitespace: “x y”
 *
 * @author Richard Fullme <richardfullmer@gmail.com>
 */
class XYPairType extends Type
{
    public function getName()
    {
        return 'JDF.XYPair';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\XYPair $pair
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($pair)
    {
        if ($pair === null) {
            return null;
        }

        if (!$pair instanceof XYPair) {
            throw ConversionException::conversionFailed($pair, $this->getName());
        }

        return implode(' ', array(
            $pair->getX(),
            $pair->getY(),
        ));
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\XYPair
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

        return new XYPair($values[0], $values[1]);
    }
}