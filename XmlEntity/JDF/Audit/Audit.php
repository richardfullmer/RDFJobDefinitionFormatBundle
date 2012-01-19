<?php
/*
 *
 */

namespace RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Audit;

use Doctrine\OXM\Mapping as OXM;

/**
 * RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Audit\Audit
 *
 * @OXM\XmlMappedSuperclass
 */
abstract class Audit
{
    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="AgentName")
     */
    protected $AgentName;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="AgentVersion")
     */
    protected $AgentVersion;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="Author")
     */
    protected $Author;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\ID
     *
     * @OXM\XmlAttribute(type="JDF.ID", name="ID")
     */
    protected $ID;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="QueueEntryID")
     */
    protected $QueueEntryID;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\IDREF
     *
     * @OXM\XmlAttribute(type="JDF.IDREF", name="refID")
     */
    protected $refID;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKEN
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKEN", name="SpawnID")
     */
    protected $SpawnID;


    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\DateTime
     *
     * @OXM\XmlAttribute(type="JDF.DateTime", name="TimeStamp", required=true)
     */
    protected $TimeStamp;


    /**
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Employee
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Employee", name="Employee")
     */
    protected $Employee;
}