<?php

/*
 * This file is part of the RDFJobDefinitionFormatBundle package.
 *
 * (c) Richard Fullmer <http://github.com/richardfullmer>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RDF\JobDefinitionFormatBundle\Model\PrintTalk;

use Doctrine\OXM\Mapping as OXM;
use RDF\JobDefinitionFormatBundle\Model\JDF\JDF;

/**
 * Quote
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Quote")
 */
class Quote extends AbstractPT
{
    /**
     * Three-digit currency definition according to [ISO4217]. Identifies
     * the currency that this Quote uses.
     *
     * If not specified, the ../Currency (in parent) MUST be used.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="Currency")
     */
    protected $Currency;

    /**
     * @var boolean
     *
     * @OXM\XmlAttribute(type="boolean", name="Estimate")
     */
    protected $Estimate;

    /**
     * @var DateTime
     * @deprecated
     *
     * @OXM\XmlAttribute(type="JDF.DateTime", name="Expires")
     */
    protected $Expires;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="QuoteID", required="true")
     */
    protected $QuoteID;

    /**
     * @var string
     * @deprecated
     *
     * @OXM\XmlAttribute(type="string", name="ReorderID")
     */
    protected $ReorderID;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="ReplaceID")
     */
    protected $ReplaceID;

    /**
     * @var boolean
     *
     * @OXM\XmlAttribute(type="boolean", name="ReturnJDF")
     */
    protected $ReturnJDF;

    /**
     * @var RDF\JobDefinitionFormatBundle\Model\JDF\JDF
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\JDF\JDF", required="true", prefix="jdf")
     */
    protected $JDF;

    /**
     * @var RDF\JobDefinitionFormatBundle\Model\PrintTalk\Pricing
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\PrintTalk\Pricing", required="true")
     */
    protected $Pricing;

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
     * @return DateTime
     */
    public function getExpires()
    {
        return $this->Expires;
    }

    /**
     * @param JDF $JDF
     * @return void
     */
    public function setJDF(JDF $JDF)
    {
        $this->JDF = $JDF;
    }

    /**
     * @return RDF\JobDefinitionFormatBundle\Model\JDF\JDF
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
     * @return RDF\JobDefinitionFormatBundle\Model\PrintTalk\Pricing
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
