<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\Type;

/**
 * It is represented identically to the XML Schema type: hexBinary
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class HexBinaryType extends Type
{
    public function getName()
    {
        return 'JDF.HexBinary';
    }
}