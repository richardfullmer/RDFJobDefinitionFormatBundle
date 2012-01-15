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
use RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF;

/**
 * A Print Buyer sends an RFQ to a Print Provider to request a quote. Usually the Negotiation Phase starts with an
 * RFQ. Sometimes, the Negotiation Phase starts with a Quotation or PurchaseOrder (see sections 3.7.2
 * “Quotation” and 3.7.3 “PurchaseOrder”).
 *
 * An RFQ MUST convey the unambiguous intentions of the Print Buyer to the Print Provider. A complex RFQ
 * MAY contain options that specify several types of acceptable materials or methods required by the Print Buyer. An
 * RFQ MAY contain other options that require the Print Provider's estimator to generate more than one quoted price
 * in the response.
 *
 * A Print Buyer sends an RFQ whose semantics vary depending on BusinessRefID.
 * Not specified: If a Print Buyer chooses to initiate a new Product process by making a request-for-quote to a
 *
 * Print Provider. It MUST send an RFQ with no BusinessRefID.
 *
 * Quotation: If a Print Buyer receives a Quotation for a Job and wants a Re-Quote for a variation of the Job,
 * it MUST send an RFQ whose BusinessRefID references the received Quotation.
 *
 * Confirmation: If a Print Buyer wants to initiate a Change Order for a Confirmed Joband the
 * PurchaseOrder form of a Change Order cannot be used because there are changes that don’t have
 * quotes, the Print Buyer MUST send an RFQ whose BusinessRefID references the Confirmation for the
 * Confirmed Job. A Change Order (CO) RFQ asks what the consequences would be for a certain change of
 * the Print Product. See 3.7.3 “PurchaseOrder” for an alternate Change Order that a Print Buyer can send.
 *
 *
 * After the Print Buyer has sent an RFQ and while it is Pending, the Print Buyer MAY send either:
 * • a Superseding RFQ that replaces the Pending one or.
 * • an unrelated RFQ or
 * • a Cancellation for a Pending RFQ after which the Print Buyer MAY choose to continue the negotiation
 *   process by sending either a new RFQ or a new PurchaseOrder for a Pending Quotation. APending
 *   Quotation exists only if the cancelled RFQ was in fact a Request for Re-Quote.
 *
 * When a Print Provider receives an RFQ, the Print Provider MUST either:
 * • accept the RFQ by sending a Quotation to the Print Buyer or
 * • decline the RFQ by either sending a Refusal to the Print Buyer or letting the RFQ expire.
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="RFQ")
 */
class RFQ extends AbstractBusinessObject
{
    /**
     * Three-digit currency definition according to [ISO4217]. The value of
     * Currency identifies the currency that the Print Provider SHOULD
     * use in the responding Quotation.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="Currency")
     */
    private $Currency;

    /**
     * If "false", the prices in the responding Quotation MUST be
     * binding amounts.
     * 
     * If "true" the Print Buyer MUST treat the prices in the responding
     * Quotation as an estimate.
     *
     * If not specified, the Print Provider MUST choose whether the
     * responding Quotation is a binding amount or an estimate.
     * 
     * @var boolean
     *
     * @OXM\XmlAttribute(type="boolean", name="Estimate")
     */
    private $Estimate;

    /**
     * Date/time when this RFQ becomes Invalid
     *
     * @var \DateTime
     *
     * @OXM\XmlAttribute(type="JDF.DateTime", name="Expires");
     */
    private $Expires;

    /**
     * White-space-separated BusinessID values that refer to
     * PurchaseOrder PrintTalk Documents that are the basis for this
     * (collected) RFQ. The RFQ is intended to lead to a re-order.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="ReorderID");
     */
    private $ReorderID;

    /**
     * RFQ/BusinessID of the RFQ that this PrintTalk Document
     * Supersedes. Superseding is only allowed as long as the RFQ to be
     * Superseded is Pending.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="ReplaceID");
     */
    private $ReplaceID;

    /**
     * Description of the Product or service that is to be produced or
     * delivered. Note that a Product description is typically used in a Print
     * Buyer to Print Provider environment, whereas a Gray Box or
     * individual Process is typically used in a subcontracting environment.
     *
     * See [JDF1.3].
     *
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF", name="JDF", prefix="jdf");
     */
    private $JDF;

    /**
     * @param  $Currency
     * @return void
     */
    public function setCurrency($Currency)
    {
        $this->Currency = $Currency;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->Currency;
    }

    /**
     * @param  $Estimate
     * @return void
     */
    public function setEstimate($Estimate)
    {
        $this->Estimate = $Estimate;
    }

    /**
     * @return bool
     */
    public function getEstimate()
    {
        return $this->Estimate;
    }

    /**
     * @param  $Expires
     * @return void
     */
    public function setExpires($Expires)
    {
        $this->Expires = $Expires;
    }

    /**
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->Expires;
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF $JDF
     * @return void
     */
    public function setJDF(JDF $JDF)
    {
        $this->JDF = $JDF;
    }

    /**
     * @return \RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF
     */
    public function getJDF()
    {
        return $this->JDF;
    }

    /**
     * @param  $ReorderID
     * @return void
     */
    public function setReorderID($ReorderID)
    {
        $this->ReorderID = $ReorderID;
    }

    /**
     * @return string
     */
    public function getReorderID()
    {
        return $this->ReorderID;
    }

    /**
     * @param  $ReplaceID
     * @return void
     */
    public function setReplaceID($ReplaceID)
    {
        $this->ReplaceID = $ReplaceID;
    }

    /**
     * @return string
     */
    public function getReplaceID()
    {
        return $this->ReplaceID;
    }
}
