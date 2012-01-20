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
 * @OXM\XmlEntity(xml="ResourcePool")
 */
class ResourcePool extends Element
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Model\JDF\Resource\Resource[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\JDF\Resource\Resource", collection=true)
     */
    protected $ResourceList;
}
