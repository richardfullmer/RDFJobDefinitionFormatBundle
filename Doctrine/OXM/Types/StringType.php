<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\Type;

/**
 * It is represented identically to the XML Schema type: normalisedString NB. This means that
 * tabs, linefeeds and so on are not valid characters.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class StringType extends Type
{
    public function getName()
    {
        return 'JDF.String';
    }
}