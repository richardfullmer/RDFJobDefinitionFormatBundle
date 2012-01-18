<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource;

use RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Element;
use Doctrine\OXM\Mapping as OXM;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 *
 * @OXM\XmlMappedSuperclass
 */
abstract class Resource extends Element
{
    protected $AgentName;
    protected $AgentVersion;
    protected $Author;
    protected $CatalogID;
    protected $CatalogDetails;
    protected $Class;

    protected $ID;

    protected $Locked;

    protected $PartUsage;

    protected $PipeID;
    protected $PipeProtocol;
    protected $PipeURL;
    protected $ProductID;
    protected $rRefs;
    protected $SpawnIDs;
    protected $SpawnStatus;
    protected $Status;
    protected $UpdateID;
    protected $SourceResourceList;
    protected $QualityControlResultList;
}
