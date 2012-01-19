<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Pool;

use RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Element;
use Doctrine\OXM\Mapping as OXM;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 *
 * @OXM\XmlEntity(xml="AuditPool")
 */
class AuditPool extends Element
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\IDREFS
     *
     * @OXM\XmlAttribute(type="JDF.IDREFS", name="rRefs")
     */
    protected $rRefs;

    /**
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Audit\Audit[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Audit\Audit", collection=true)
     */
    protected $AuditList;
}
