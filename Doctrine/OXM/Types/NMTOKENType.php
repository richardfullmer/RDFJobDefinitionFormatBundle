<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\NMTOKEN;
use Doctrine\OXM\Types\ConversionException;
use Doctrine\OXM\Types\Type;

/**
 * Represents the NMTOKEN Attribute type from [XML]. It represents a
 * name or string that contains no space characters.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class NMTOKENType extends Type
{
    public function getName()
    {
        return 'JDF.NMTOKEN';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\NMTOKEN $token
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($token)
    {
        if ($token === null) {
            return null;
        }

        if (!$token instanceof NMTOKEN) {
            throw ConversionException::conversionFailed($token, $this->getName());
        }

        return (string) $token->getValue();
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\NMTOKEN
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        return new NMTOKEN($value);
    }
}