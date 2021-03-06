<?php
/*
 *
 */
 
namespace RDF\JobDefinitionFormatBundle\Model\JDF;

use RDF\JobDefinitionFormatBundle\Type\URI;
use RDF\JobDefinitionFormatBundle\Type\ID;
use RDF\JobDefinitionFormatBundle\Type\NMTOKEN;
use RDF\JobDefinitionFormatBundle\Type\NMTOKENS;
use Doctrine\OXM\Mapping as OXM;

/**
 * @OXM\XmlRootEntity(xml="JDF")
 */
class JDF extends Element
{
    const ACTIVATION_INACTIVE = 'Inactive';
    const ACTIVATION_INFORMATIVE = 'Informative';
    const ACTIVATION_HELD = 'Held';
    const ACTIVATION_ACTIVE = 'Active';
    const ACTIVATION_TEST_RUN = 'TestRun';
    const ACTIVATION_TEST_RUN_AND_GO = 'TestRunAndGo';

    const CATEGORY_BINDING = 'Binding';
    const CATEGORY_CUTTING = 'Cutting';
    const CATEGORY_DIGITAL_PRINTING = 'DigitalPrinting';
    const CATEGORY_FINAL_IMAGING = 'FinalImaging';
    const CATEGORY_FINAL_RIPING = 'FinalRIPing';
    const CATEGORY_FOLDING = 'Folding';
    const CATEGORY_NEWSPRINTING = 'NewsPrinting';
    const CATEGORY_POST_PRESS = 'PostPress';
    const CATEGORY_PRE_PRESS = 'PrePress';
    const CATEGORY_PRINTING = 'Printing';
    const CATEGORY_PROOF_IMAGING = 'ProofImaging';
    const CATEGORY_PROOF_RIPING = 'ProofRIPing';
    const CATEGORY_PUBLISHING_PREPARATION = 'PublishingPreparation';
    const CATEGORY_RIPING = 'RIPing';
    const CATEGORY_WEB_PRINTING = 'WebPrinting';

    const STATUS_WAITING = 'Waiting';
    const STATUS_TEST_RUN_IN_PROGRESS = 'TestRunInProgress';
    const STATUS_READY = 'Ready';
    const STATUS_FAILED_TEST_RUN = 'FailedTestRun';
    const STATUS_SETUP = 'Setup';
    const STATUS_IN_PROGRESS = 'InProgress';
    const STATUS_CLEANUP = 'Cleanup';
    const STATUS_SPAWNED = 'Spawned';
    const STATUS_SUSPENDED = 'Suspended';
    const STATUS_STOPPED = 'Stopped';
    const STATUS_COMPLETED = 'Completed';
    const STATUS_ABORTED = 'Aborted';
    const STATUS_PART = 'Part';
    const STATUS_POOL = 'Pool';

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKEN
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKEN", name="Activation")
     */
    protected $Activation;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKEN
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKEN", name="Category")
     */
    protected $Category;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKENS
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKENS", name="ICSVersions")
     */
    protected $ICSVersions;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\ID
     *
     * @OXM\XmlAttribute(type="JDF.ID", name="ID", required=true)
     */
    protected $ID;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="JDF.String", name="JobID")
     */
    protected $JobID;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="JDF.String", name="JobPartID")
     */
    protected $JobPartID;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="JDF.String", name="MaxVersion")
     */
    protected $MaxVersion;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKENS
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKENS", name="NamedFeatures")
     */
    protected $NamedFeatures;


    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="JDF.String", name="ProjectID")
     */
    protected $ProjectID;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="JDF.String", name="RelatedJobID")
     */
    protected $RelatedJobID;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="JDF.String", name="RelatedJobPartID")
     */
    protected $RelatedJobPartID;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKEN
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKEN", name="SpawnID")
     */
    protected $SpawnID;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKEN
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKEN", name="Status")
     */
    protected $Status;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="JDF.String", name="StatusDetails")
     */
    protected $StatusDetails;

    /**
     * @var boolean
     *
     * @OXM\XmlAttribute(type="JDF.Boolean", name="Template")
     */
    protected $Template;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="JDF.String", name="TemplateID")
     */
    protected $TemplateID;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="JDF.String", name="TemplateVersion")
     */
    protected $TemplateVersion;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKEN
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKEN", name="Type", required=true)
     */
    protected $Type;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKENS
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKENS", name="Types")
     */
    protected $Types;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="JDF.String", name="Version")
     */
    protected $Version;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\URI
     *
     * @OXM\XmlAttribute(type="JDF.URI", name="xmlns")
     */
    protected $xmlns;

    /**
     * @var
     */
    protected $AncestorPool;

    /**
     * @var Pool\AuditPool[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\JDF\Pool\AuditPool", name="AuditPool")
     */
    protected $AuditPool;

    protected $CustomerInfo;

    /**
     * @var JDF[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\JDF\JDF", name="JDF", collection=true)
     */
    protected $JDFList;

    protected $NodeInfo;


    /**
     * @var Pool\ResourceLinkPool[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\JDF\Pool\ResourceLinkPool", name="ResourceLinkPool")
     */
    protected $ResourceLinkPool;

    /**
     * @var Pool\ResourcePool[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\JDF\Pool\ResourcePool", name="ResourcePool")
     */
    protected $ResourcePool;

    protected $StatusPool;

    public function __construct(ID $ID = null, NMTOKEN $Type = null)
    {
        $this->xmlns = new URI("http://www.CIP4.org/JDFSchema_1_1");
        $this->ID = $ID;
        $this->Type = $Type;
    }

}
