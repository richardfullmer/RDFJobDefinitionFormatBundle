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

/**
 * Price
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Price")
 */
class Price extends AbstractPT
{
    /**
     * Amount of items that this Price refers to. If not specified and
     * UnitPrice is specified, the Amount will be determined upon
     * completion. If UnitPrice is specified, Amount MUST be
     * specified in an Invoice.
     * 
     * @var double
     *
     * @OXM\XmlAttribute(type="float", name="Amount")
     */
    private $Amount;

    /**
     * The description of the Item. Note that DescriptiveName is
     * required in Price, unlike DescriptiveName in the Abstract pt
     * Element, where it is optional.
     * 
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="DescriptiveName", required=true)
     */
    private $DescriptiveName;

    /**
     * List of jdf:JDF/ProductID of Items within the associated
     * jdf:JDF of this Quote that this Price relates to.
     *
     * @var string
     * 
     * @deprecated starting with PrintTalk 1.3, use LineID.
     * 
     * @OXM\XmlAttribute(type="string", name="ItemRefs")
     */
    private $ItemRefs;

    /**
     * The unique identifier for this (line) Item.
     *
     * This Price Element is referenced by any Element in the
     * Quote/jdf:JDF whose GeneralID[IDUsage =
     * "LineID"]/IDValue equals the value of this LineID.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="LineID")
     */
    private $LineID;

    /**
     * Line items that this line item relates to, for instance taxes or
     * rebates.
     *
     * If Unit = "Percent", the total value MUST be calculated from
     * all line items referenced by LineIDRefs.
     * 
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="LineIDRefs")
     */
    private $LineIDRefs;

    /**
     * The price of the entire amount as specified by Amount of the
     * Item. Price MUST be specified in an Invoice. If neither Price
     * nor UnitPrice is specified, the price is unknown at Quotation time
     * and will be specified in the invoice, e.g., taxes or discounts. No-
     * charge items, e.g., line items that are included within other line
     * items, must have a price of 0.
     *
     * @var double
     *
     * @OXM\XmlAttribute(type="float", name="Price")
     */
    private $Price;

    /**
     * MAY be specified if exists(UnitPrice), otherwise MUST
     * NOT be specified. The unit of measurement for Amount and
     * UnitPrice.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="Unit")
     */
    private $Unit;

    /**
     * Price for one unit of the Item, i.e. the Price of the Item if
     * Amount="1". If Unit = "Percent", then UnitPrice
     * specifies the percentage of the total cost that this line item
     * represents.
     *
     * @var double
     *
     * @OXM\XmlAttribute(type="float", name="UnitPrice")
     */
    private $UnitPrice;

    /**
     * Price for orders in excess of the nominal delivery quantity
     * specified in Amount.
     * 
     * @var RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Additional[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Additional", name="Additional", collection=true)
     */
    private $Additionals;

    /**
     * @param array $Additionals
     * @return void
     */
    public function setAdditionals(array $Additionals)
    {
        foreach ($Additionals as $Additional) {
            $this->addAdditional($Additional);
        }
    }

    /**
     * @param Additional $Additional
     * @return void
     */
    public function addAdditional(Additional $Additional)
    {
        $this->Additionals[] = $Additional;
    }

    /**
     * @return RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Additional[]
     */
    public function getAdditionals()
    {
        return $this->Additionals;
    }

    /**
     * @param  $Amount
     * @return void
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;
    }

    /**
     * @return double
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * @param  $DescriptiveName
     * @return void
     */
    public function setDescriptiveName($DescriptiveName)
    {
        $this->DescriptiveName = $DescriptiveName;
    }

    /**
     * @return string
     */
    public function getDescriptiveName()
    {
        return $this->DescriptiveName;
    }

    /**
     * @param  $ItemRefs
     * @return void
     */
    public function setItemRefs($ItemRefs)
    {
        $this->ItemRefs = $ItemRefs;
    }

    /**
     * @return string
     */
    public function getItemRefs()
    {
        return $this->ItemRefs;
    }

    /**
     * @param  $LineID
     * @return void
     */
    public function setLineID($LineID)
    {
        $this->LineID = $LineID;
    }

    /**
     * @return string
     */
    public function getLineID()
    {
        return $this->LineID;
    }

    /**
     * @param  $LineIDRefs
     * @return void
     */
    public function setLineIDRefs($LineIDRefs)
    {
        $this->LineIDRefs = $LineIDRefs;
    }

    /**
     * @return string
     */
    public function getLineIDRefs()
    {
        return $this->LineIDRefs;
    }

    /**
     * @param  $Price
     * @return void
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * @param  $Unit
     * @return void
     */
    public function setUnit($Unit)
    {
        $this->Unit = $Unit;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->Unit;
    }

    /**
     * @param  $UnitPrice
     * @return void
     */
    public function setUnitPrice($UnitPrice)
    {
        $this->UnitPrice = $UnitPrice;
    }

    /**
     * @return double
     */
    public function getUnitPrice()
    {
        return $this->UnitPrice;
    }
}
