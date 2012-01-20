<?php

/*
 * This file is part of the RDFJobDefinitionFormatBundle package.
 *
 * (c) Richard Fullmer <http://github.com/richardfullmer>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RDF\JobDefinitionFormatBundle\Model\PrintTalk\BusinessObject;

use Doctrine\OXM\Mapping as OXM;
use RDF\JobDefinitionFormatBundle\Model\JDF\JDF;

/**
 * Usually a Print Provider creates a Quotation after receiving an RFQ. Sometimes, a Print Provider creates a
 * Quotation as the first Business Object in the Negotiation Phase.
 *
 * If the Print Provider chooses to accept an RFQ, the Print Provider creates one or more Quote Elements and sends
 * them back to the Print Buyer in a Quotation Element. Each Quote Element represents one quote for the Job.
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Quotation")
 */
class Quotation extends AbstractBusinessObject
{
    /**
     * Three-digit currency definition according to [ISO4217]. Identifies the
     * currency that each Quote[not(exists(Currency))] Element
     * inside this Quotation uses.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="Currency")
     */
    protected $Currency;

    /**
     * For each Quote[not(exists(Estimate))] Element inside this
     * Quotation, the price MUST be a binding amount if
     * Estimate="false", otherwise, the Print Buyer MUST treat the
     * price as an estimate only.
     * 
     * @var boolean
     *
     * @OXM\XmlAttribute(type="boolean", name="Estimate")
     */
    protected $Estimate;

    /**
     * Date/time when this RFQ becomes Invalid
     *
     * @var \DateTime
     *
     * @OXM\XmlAttribute(type="JDF.DateTime", name="Expires");
     */
    protected $Expires;

    /**
     * White-space-separated unique BusinessID values that refer to
     * PurchaseOrder PrintTalk Documents that are the basis for this
     * Quotation. In this scenario the Quotation MAY be the starting
     * point of the Negotiation Phase.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="ReorderID");
     */
    protected $ReorderID;

    /**
     * Quotation/BusinessID of the Quotation that this
     * Quotation Supersedes.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="ReplaceID");
     */
    protected $ReplaceID;

    /**
     * Each Quote Element MUST describe a complete distinct Print
     * Product variation. A Quote MUST NOT be a quote for an
     * individual part of the Job.
     *
     * @var array
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\PrintTalk\Quote", required="true", collection=true)
     */
    protected $Quote;


    public function setCurrency($Currency)
    {
        $this->Currency = $Currency;
    }

    public function getCurrency()
    {
        return $this->Currency;
    }

    public function setEstimate($Estimate)
    {
        $this->Estimate = $Estimate;
    }

    public function getEstimate()
    {
        return $this->Estimate;
    }

    public function setExpires($Expires)
    {
        $this->Expires = $Expires;
    }

    public function getExpires()
    {
        return $this->Expires;
    }

    public function setQuote($Quote)
    {
        $this->Quote = $Quote;
    }

    public function getQuote()
    {
        return $this->Quote;
    }

    public function setReorderID($ReorderID)
    {
        $this->ReorderID = $ReorderID;
    }

    public function getReorderID()
    {
        return $this->ReorderID;
    }

    public function setReplaceID($ReplaceID)
    {
        $this->ReplaceID = $ReplaceID;
    }

    public function getReplaceID()
    {
        return $this->ReplaceID;
    }
}
