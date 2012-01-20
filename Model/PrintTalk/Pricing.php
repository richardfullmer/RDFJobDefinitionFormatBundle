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

/**
 * Pricing
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Pricing")
 */
class Pricing extends AbstractPT
{
    /**
     * Payment details.
     *
     * @var RDF\JobDefinitionFormatBundle\Model\PrintTalk\Payment
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\PrintTalk\Payment")
     */
    protected $Payment;

    /**
     * Each Price Element represents the price for a single Item. The sum
     * of prices from all child Price Elements MUST be treated as the total
     * price for a Quote Element.
     * 
     * @var RDF\JobDefinitionFormatBundle\Model\PrintTalk\Price[]
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\PrintTalk\Price", name="Price", required=true, collection=true)
     */
    protected $Prices;

    /**
     * @param RDF\JobDefinitionFormatBundle\Model\PrintTalk\Payment $Payment
     * @return void
     */
    public function setPayment(Payment $Payment)
    {
        $this->Payment = $Payment;
    }

    /**
     * @return RDF\JobDefinitionFormatBundle\Model\PrintTalk\Payment
     */
    public function getPayment()
    {
        return $this->Payment;
    }

    /**
     * @param array $Prices
     * @return void
     */
    public function setPrices(array $Prices)
    {
        foreach ($Prices as $Price) {
            $this->addPrice($Price);
        }
    }

    /**
     * @param Price $Price
     * @return void
     */
    public function addPrice(Price $Price)
    {
        $this->Prices[] = $Price;
    }

    /**
     * @return RDF\JobDefinitionFormatBundle\Model\PrintTalk\Price[]
     */
    public function getPrices()
    {
        return $this->Prices;
    }
}
