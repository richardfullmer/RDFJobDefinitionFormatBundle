<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Model\JDF\Pool;

use RDF\JobDefinitionFormatBundle\Model\JDF\Element;
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
     * @var \RDF\JobDefinitionFormatBundle\Model\JDF\Audit\Audit[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\JDF\Audit\Audit", collection=true)
     */
    protected $AuditList;
}
