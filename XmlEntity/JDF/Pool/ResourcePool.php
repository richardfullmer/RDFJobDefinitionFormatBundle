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
 * @OXM\XmlEntity(xml="ResourcePool")
 */
class ResourcePool
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Resource[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Resource", collection=true)
     */
    protected $ResourceList;
}
