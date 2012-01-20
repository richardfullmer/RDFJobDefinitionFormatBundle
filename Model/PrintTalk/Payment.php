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
 * Payment
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Payment")
 */
class Payment extends AbstractPT
{
    /**
     * Describes the payment terms and conditions in a human readable form.
     *
     * @var string
     *
     * @OXM\XmlText(name="PayTerm", type="string")
     */
    protected $PayTerm;

    /**
     * Specifies credit card information.
     * 
     * A Print Buyer MAY supply CreditCard. A Print Provider MUST
     * NOT supply CreditCard.
     *
     * @var RDF\JobDefinitionFormatBundle\Model\PrintTalk\CreditCard
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\PrintTalk\CreditCard", name="CreditCard")
     */
    protected $CreditCard;

    /**
     * Additional details about payment MAY be specified using GeneralID
     * Elements.
     *
     * @var RDF\JobDefinitionFormatBundle\Model\JDF\GeneralID
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\JDF\GeneralID", collection=true)
     */
    protected $GeneralIDs;

    /**
     * @param CreditCard $CreditCard
     * @return void
     */
    public function setCreditCard(CreditCard $CreditCard)
    {
        $this->CreditCard = $CreditCard;
    }

    /**
     * @return RDF\JobDefinitionFormatBundle\Model\PrintTalk\CreditCard
     */
    public function getCreditCard()
    {
        return $this->CreditCard;
    }

    /**
     * @param array $GeneralIDs
     * @return void
     */
    public function setGeneralIDs(array $GeneralIDs)
    {
        foreach ($GeneralIDs as $GeneralID) {
            $this->addGeneralID($GeneralID);
        }
    }

    /**
     * @param GeneralID $GeneralID
     * @return void
     */
    public function addGeneralID(GeneralID $GeneralID)
    {
        $this->GeneralIDs[] = $GeneralID;
    }

    /**
     * @return RDF\JobDefinitionFormatBundle\Model\JDF\GeneralID
     */
    public function getGeneralIDs()
    {
        return $this->GeneralIDs;
    }

    /**
     * @param  $PayTerm
     * @return void
     */
    public function setPayTerm($PayTerm)
    {
        $this->PayTerm = $PayTerm;
    }

    /**
     * @return string
     */
    public function getPayTerm()
    {
        return $this->PayTerm;
    }
}
