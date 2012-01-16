<?php

/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\Type;
use Doctrine\OXM\Types\ConversionException;
use RDF\JobDefinitionFormatBundle\Type\Rectangle;

/**
 * To maintain compatibility with PJTF, rectangles are primitive data types and are encoded as a string
 * of four numbers, separated by whitespace: "llx lly urx ury" or "l b r t".
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class RectangleType extends Type
{
    public function getName()
    {
        return 'JDF.Rectangle';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\Rectangle $rect
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($rect)
    {
        if ($rect === null) {
            return null;
        }

        if (!$rect instanceof Rectangle) {
            throw ConversionException::conversionFailed($rect, $this->getName());
        }

        return implode(' ', array(
            $rect->getLlx(),
            $rect->getLly(),
            $rect->getUrx(),
            $rect->getUry(),
        ));
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\Rectangle
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

        return new Rectangle($values[0], $values[1], $values[2], $values[3]);
    }
}