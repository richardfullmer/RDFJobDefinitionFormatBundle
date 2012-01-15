<?php

/*
 * This file is part of the RDFJobDefinitionFormatBundle package.
 *
 * (c) Richard Fullmer <http://github.com/richardfullmer>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\BusinessObject;

use Doctrine\OXM\Mapping as OXM;
use RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\AbstractPT;
    
/**
 * AbstractBusinessObject
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlMappedSuperclass
 */
abstract class AbstractBusinessObject extends AbstractPT
{
    /**
     * The unique identity of the user that "pushed the button" to send
     * this PrintTalk Document, for example, a PrintBuyer in an RFQ or
     * a Print Provider's estimator in a Quotation.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="AgentID")
     */
    private $AgentID;

    /**
     * The display name of the user that is identified by AgentID.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="AgentDisplayName")
     */
    private $AgentDisplayName;

    /**
     * AuxID is used as a reference to the Print Buyer's internal system
     * ID by the sender. An AuxID MUST be used to carry a system’s
     * internal ID.
     *
     * Modification note: starting with PrintTalk 1.3, MUST use
     * AbstractPT/jdf:GeneralID for any IDs other than the Print Buyer's
     * internal system ID.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="AuxID")
     */
    private $AuxID;

    /**
     * The unique identifier for this Business Object
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="BusinessID")
     */
    private $BusinessID;

    /**
     * The value of this BusinessRefID MUST be the same as the
     * BusinessID of some other Pending Business Object which acts
     * as the primary parameter to the Business Transaction that this
     * PrintTalk Document represents. See pt/GeneralID for
     * secondary parameters.
     *
     * A BusinessRefID MUST refer to a Business Object that was
     * received from the other party.
     *
     * For example, a Quotation/BusinessRefID references an
     * RFQ if it provides a quote for the RFQ, or it references a
     * PurchaseOrder if it specifies a Change Order
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="BusinessRefID")
     */
    private $BusinessRefID;

    /**
     * Date/time when this Business Object was sent.
     *
     * @var DateTime
     * @deprecated starting with PrintTalk 1.3, use PrintTalk/Timestamp
     *
     * @OXM\XmlAttribute(type="JDF.DateTime", name="RequestDate")
     */
    private $RequestDate;

    /**
     * @param  $AgentDisplayName
     * @return void
     */
    public function setAgentDisplayName($AgentDisplayName)
    {
        $this->AgentDisplayName = $AgentDisplayName;
    }

    /**
     * @return string
     */
    public function getAgentDisplayName()
    {
        return $this->AgentDisplayName;
    }

    /**
     * @param  $AgentID
     * @return void
     */
    public function setAgentID($AgentID)
    {
        $this->AgentID = $AgentID;
    }

    /**
     * @return string
     */
    public function getAgentID()
    {
        return $this->AgentID;
    }

    /**
     * @param  $AuxID
     * @return void
     */
    public function setAuxID($AuxID)
    {
        $this->AuxID = $AuxID;
    }

    /**
     * @return string
     */
    public function getAuxID()
    {
        return $this->AuxID;
    }

    /**
     * @param  $BusinessID
     * @return void
     */
    public function setBusinessID($BusinessID)
    {
        $this->BusinessID = $BusinessID;
    }

    /**
     * @return string
     */
    public function getBusinessID()
    {
        return $this->BusinessID;
    }

    /**
     *
     */
    public function setBusinessRefID($BusinessRefID)
    {
        $this->BusinessRefID = $BusinessRefID;
    }

    /**
     * 
     */
    public function getBusinessRefID()
    {
        return $this->BusinessRefID;
    }

    /**
     * @param  $RequestDate
     * @return void
     * @deprecated
     */
    public function setRequestDate($RequestDate)
    {
        $this->RequestDate = $RequestDate;
    }

    /**
     * @return DateTime
     * @deprecated
     */
    public function getRequestDate()
    {
        return $this->RequestDate;
    }
}
