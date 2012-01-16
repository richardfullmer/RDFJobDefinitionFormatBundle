<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\Type;

/**
 * Represents the ID Attribute from [XMLSchema]. It represents a name or string that
 * contains no space characters and starts with a letter, or ‘_’. Each ID value MUST be
 * unique within a JDF document and thus uniquely identify the ele­ments that bear them.
 *
 * Note that the ID Attribute definition in [XMLSchema] is more restrictive than the ID
 * Attribute definition in [XML]. [XMLSchema] explicitly forbids the use of ‘:’ in ID.
 *
 * It is represented identically to the XML Schema type: ID
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class IDType extends Type
{
    public function getName()
    {
        return 'JDF.ID';
    }
}