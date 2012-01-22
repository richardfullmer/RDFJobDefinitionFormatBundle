<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Model\JDF\Resource\Link;

use RDF\JobDefinitionFormatBundle\Model\JDF\Element;
use Doctrine\OXM\Mapping as OXM;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 *
 * @OXM\XmlMappedSuperclass
 */
abstract class ResourceLink extends Element
{
    protected $CombinedProcessIndex;
    protected $CombinedProcessType;
    protected $DraftOK;
    protected $Duration;
    protected $MinLateStatus;
    protected $MinStatus;
    protected $PipePartIDKeys;
    protected $PipeProtocol;
    protected $PipeURL;
    protected $ProcessUsage;
    protected $rRef;
    protected $rSubRef;
    protected $Start;
    protected $StartOffset;
    protected $Usage;
    protected $AmountPool;
    protected $PartList;
}
