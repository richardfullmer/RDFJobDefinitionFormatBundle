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
 * @OXM\XmlEntity(xml="ResourceLinkPool")
 */
class ResourceLinkPool extends Element
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Model\JDF\Resource\Link\ResourceLink[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\JDF\Resource\Link\ResourceLink", collection=true)
     */
    protected $ResourceLinkList;
}
