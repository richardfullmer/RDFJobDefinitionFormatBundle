<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\Type;

/**
 * Represents a natural language defined in [RFC1766].
 *
 * It is represented identically to the XML Schema type: language
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class LanguageType extends Type
{
    public function getName()
    {
        return 'JDF.Language';
    }
}