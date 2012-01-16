<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\ConversionException;
use RDF\JobDefinitionFormatBundle\Type\IDREF;
use Doctrine\OXM\Types\Type;

/**
 * It is represented identically to the XML Schema type: IDREF
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class IDREFType extends Type
{
    public function getName()
    {
        return 'JDF.IDREF';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\IDREF $idref
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($idref)
    {
        if ($idref === null) {
            return null;
        }

        if (!$idref instanceof IDREF) {
            throw ConversionException::conversionFailed($idref, $this->getName());
        }

        return (string) $idref->getValue();
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\IDREF
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        return new IDREF($value);
    }
}