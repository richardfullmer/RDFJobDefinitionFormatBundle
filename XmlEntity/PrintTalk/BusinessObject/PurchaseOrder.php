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
use RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Pricing;
use RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF;

/**
 * PurchaseOrder
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="PurchaseOrder")
 */
class PurchaseOrder extends AbstractBusinessObject
{
    /**
     * Three-digit currency definition according to [ISO4217]. Identifies the
     * currency that this PurchaseOrder uses.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="Currency")
     */
    private $Currency;

    /**
     * Date/time when this PurchaseOrder becomes Invalid
     *
     * @var \DateTime
     *
     * @OXM\XmlAttribute(type="jdfdatetime", name="Expires");
     */
    private $Expires;

    /**
     * This PurchaseOrder PO selects the quote specified by
     * Quotation[BusinessID=Q]/Quote[QuoteID=q]. where
     * Q = PO/BusinessRefID and q = PO/QuoteID.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="QuoteID")
     */
    private $QuoteID;

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
    private $ReorderID;

    /**
     * PurchaseOrder/BusinessID of the PurchaseOrder that this
     * PurchaseOrder Supersedes. Superseding is only allowed as long
     * as the PurchaseOrder to be Superseded is Pending.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="ReplaceID");
     */
    private $ReplaceID;

    /**
     * If ReturnJDF = "true" the Print Provider MUST send to the Print
     * Buyer a ReturnJob Business Object that has a completed JDF
     * including Audit Elements; otherwise, the Print Provider MUST
     * NOT send a ReturnJob.
     * 
     * @var boolean
     *
     * @OXM\XmlAttribute(type="boolean", name="ReturnJDF")
     */
    private $ReturnJDF;

    /**
     * Description of the Print Product. The JDF Element MAY be used to
     * specify a very detailed Print Product, or it MAY also be used to
     * describe the ordering of finished goods in catalog-based
     * environments.
     *
     * @var RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF", required=true)
     */
    private $JDF;

    /**
     * Starting with Printtalk 1.3, the pricing information is in PrintTalk
     * rather than JDF.
     *
     * Pricing MUST NOT be specified if BusinessRefID references
     * a Quotation. Pricing MAY be specified if the PurchaseOrder is
     * based on a global contract referenced by ReorderID.
     *
     * @var RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Pricing
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Pricing")
     */
    private $Pricing;

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
     * @param  $JDF
     * @return void
     */
    public function setJDF(JDF $JDF)
    {
        $this->JDF = $JDF;
    }

    /**
     * @return RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF
     */
    public function getJDF()
    {
        return $this->JDF;
    }

    /**
     * @param Pricing $Pricing
     * @return void
     */
    public function setPricing(Pricing $Pricing)
    {
        $this->Pricing = $Pricing;
    }

    /**
     * @return RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Pricing
     */
    public function getPricing()
    {
        return $this->Pricing;
    }

    /**
     * @param  $QuoteID
     * @return void
     */
    public function setQuoteID($QuoteID)
    {
        $this->QuoteID = $QuoteID;
    }

    /**
     * @return string
     */
    public function getQuoteID()
    {
        return $this->QuoteID;
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

    /**
     * @param  $ReturnJDF
     * @return void
     */
    public function setReturnJDF($ReturnJDF)
    {
        $this->ReturnJDF = $ReturnJDF;
    }

    /**
     * @return bool
     */
    public function getReturnJDF()
    {
        return $this->ReturnJDF;
    }
}
