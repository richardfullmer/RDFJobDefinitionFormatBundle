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
 * @OXM\XmlEntity(xml="ResourceLinkPool")
 */
class ResourceLinkPool extends Element
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Link\ResourceLink[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Link\ResourceLink", collection=true)
     */
    protected $ResourceLinkList;
}
