<?php

/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\Type;

/**
 * Attributes are encoded as either of the string values "true"
 * or "false". The XML Schema data type boolean values of "1" or "0" are not permitted.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class BooleanType extends Type
{
    public function getName()
    {
        return 'JDF.Boolean';
    }

    public function convertToXmlValue($range)
    {
        return $range ? "true" : "false";
    }
    
    public function convertToPHPValue($value)
    {
        if (null === $value) {
            return null;
        } elseif ($value == 'false') {
            return false;
        } elseif ($value == 'true') {
            return true;
        }
    }
}