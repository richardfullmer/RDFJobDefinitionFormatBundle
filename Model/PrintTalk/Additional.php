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
 * Additional
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Additional")
 */
class Additional extends AbstractPT
{
    /**
     * The additional number of Items that Price refers to. The unit of
     * measurement MUST be the ../Unit.
     *
     * @var double
     *
     * @OXM\XmlAttribute(type="float", name="Amount")
     */
    protected $Amount;

    /**
     * The price of the additional number of Items as specified in
     * Amount.
     *
     * @var double
     *
     * @OXM\XmlAttribute(type="float", name="Price")
     */
    protected $Price;

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
}
