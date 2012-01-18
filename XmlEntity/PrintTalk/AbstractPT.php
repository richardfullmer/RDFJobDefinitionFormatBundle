<?php

/*
 * This file is part of the RDFJobDefinitionFormatBundle package.
 *
 * (c) Richard Fullmer <http://github.com/richardfullmer>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk;

use RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Comment;
use Doctrine\OXM\Mapping as OXM;

/**
 * From
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlMappedSuperclass
 */
abstract class AbstractPT
{
    /**
     * Display text for this Element
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="DescriptiveName")
     */
    protected $DescriptiveName;

    /**
     * Comment text that contains from form information about the Element.
     * See JDF "Generic Element" for the definition of the Comment Element
     *
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Comment
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Comment", prefix="jdf", name="Comment")
     */
    protected $jdfComment;

    /**
     * Optional parameters for a Business Transaction. GeneralID
     * Elements MAY be used e.g. to carry a system's internal IDs.
     * Generally both parties MUST agree on the semantics of these IDs in
     * an out-of-band communication.
     * 
     * Note: a GeneralID references a Business Object that is a secondary
     * parameter in a Business Transaction, whereas BusinessRefID
     * references a Business Object that is the primary parameter in a
     * Business Transaction.
     *
     * @var
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\GeneralID", prefix="jdf", name="GeneralID")
     */
    protected $jdfGeneralID;

    public function setDescriptiveName($DescriptiveName)
    {
        $this->DescriptiveName = $DescriptiveName;
    }

    public function getDescriptiveName()
    {
        return $this->DescriptiveName;
    }

    public function setJdfComment($jdfComment)
    {
        $this->jdfComment = $jdfComment;
    }

    public function getJdfComment()
    {
        return $this->jdfComment;
    }

    public function setJdfGeneralID($jdfGeneralID)
    {
        $this->jdfGeneralID = $jdfGeneralID;
    }

    public function getJdfGeneralID()
    {
        return $this->jdfGeneralID;
    }
}

class GeneralID
{
    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="IDUsage")
     */
    protected $IDUsage;

    /**
     * The value of the identifier that IDUsage specifies.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="IDUsage")
     */
    protected $IDValue;
}
