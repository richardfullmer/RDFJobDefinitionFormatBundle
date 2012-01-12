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

use Doctrine\OXM\Mapping as OXM;
use RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF;

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
    private $Currency;

    /**
     * @var boolean
     *
     * @OXM\XmlAttribute(type="boolean", name="Estimate")
     */
    private $Estimate;

    /**
     * @var DateTime
     * @deprecated
     *
     * @OXM\XmlAttribute(type="jdfdatetime", name="Expires")
     */
    private $Expires;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="QuoteID", required="true")
     */
    private $QuoteID;

    /**
     * @var string
     * @deprecated
     *
     * @OXM\XmlAttribute(type="string", name="ReorderID")
     */
    private $ReorderID;

    /**
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="ReplaceID")
     */
    private $ReplaceID;

    /**
     * @var boolean
     *
     * @OXM\XmlAttribute(type="boolean", name="ReturnJDF")
     */
    private $ReturnJDF;

    /**
     * @var RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\JDF", required="true", prefix="jdf")
     */
    private $JDF;

    /**
     * @var RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Pricing
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Pricing", required="true")
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
