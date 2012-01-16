<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\Type;

/**
 * IDREF Represents the IDREF Attribute from [XMLSchema]. For a valid XML-document, an
 * element with the ID value specified in IDREF MUST be present in the scope of the document.
 * 
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
}