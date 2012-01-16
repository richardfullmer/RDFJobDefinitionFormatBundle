<?php

/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\Type;
use Doctrine\OXM\Types\ConversionException;
use RDF\JobDefinitionFormatBundle\Type\Shape;

/**
 * Shapes are primitive data types and are encoded as a list of three numbers
 * (as doubles) separated by whitespace in the sequence: “L a b”
 *
 * @author Richard Fullme <richardfullmer@gmail.com>
 */
class ShapeType extends Type
{
    public function getName()
    {
        return 'JDF.Shape';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\Shape $shape
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($shape)
    {
        if ($shape === null) {
            return null;
        }

        if (!$shape instanceof Shape) {
            throw ConversionException::conversionFailed($shape, $this->getName());
        }

        return implode(' ', array(
            $shape->getX(),
            $shape->getY(),
            $shape->getZ(),
        ));
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\Shape
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

        return new Shape($values[0], $values[1], $values[2]);
    }
}