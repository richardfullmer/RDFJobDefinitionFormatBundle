<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\XmlEntity\JDF;

use Doctrine\OXM\Mapping as OXM;

/**
 * JDF contains a set of generic structures that MAY occur in any Element of a JDF or JMF document.
 * Some of these are provided as containers for human-readable comments and descriptions and are described below.
 * Others define the usage policy for Attributes and Subelements.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 *
 * @OXM\XmlMappedSuperclass
 */
abstract class Element
{
    const SETTINGS_POLICY_BEST_EFFORT = 'BestEffort';
    const SETTINGS_POLICY_MUST_HONOR = 'MustHonor';
    const SETTINGS_POLICY_OPERATOR_INTERVENTION = 'OperatorIntervention';

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKENS
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKENS", name="BestEffortExceptions")
     */
    protected $BestEffortExceptions;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\URL
     *
     * @OXM\XmlAttribute(type="JDF.URL", name="CommentURL")
     */
    protected $CommentURL;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="DescriptiveName")
     */
    protected $DescriptiveName;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKENS
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKENS", name="MustHonorExceptions")
     */
    protected $MustHonorExceptions;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKENS
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKENS", name="OperatorInterventionExceptions")
     */
    protected $OperatorInterventionExceptions;

    /**
     * @var \RDF\JobDefinitionFormatBundle\Type\NMTOKEN
     *
     * @OXM\XmlAttribute(type="JDF.NMTOKEN", name="SettingsPolicy")
     */
    protected $SettingsPolicy;

    /**
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Comment[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Comment", name="Comment", collection=true)
     */
    protected $CommentList;

    /**
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\JDF\GeneralID[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\GeneralID", name="GeneralID", collection=true)
     */
    protected $GeneralIDList;

    /**
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Preview[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Preview", name="Preview", collection=true)
     */
    protected $PreviewList;
}
