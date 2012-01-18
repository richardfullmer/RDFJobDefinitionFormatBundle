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
 * CreditCard
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="CreditCard")
 */
class CreditCard extends AbstractPT
{
    /**
     * Authorization code for this Business Transaction.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="Authorization")
     */
    protected $Authorization;

    /**
     * Expiration date of the Authorization.
     *
     * @var gYearMonth
     *
     * @OXM\XmlAttribute(type="string", name="AuthorizationExpires")
     */
    protected $AuthorizationExpires;

    /**
     * Expiration date of the credit card.
     *
     * @var gYearMonth
     *
     * @OXM\XmlAttribute(type="string", name="Expires")
     */
    protected $Expires;

    /**
     * Credit card number. The format is specified without blanks or
     * any other separator characters.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="Number")
     */
    protected $Number;

    /**
     * Credit card brand.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string", name="Type")
     */
    protected $Type;

    /**
     * @param  $Authorization
     * @return void
     */
    public function setAuthorization($Authorization)
    {
        $this->Authorization = $Authorization;
    }

    /**
     * @return string
     */
    public function getAuthorization()
    {
        return $this->Authorization;
    }

    /**
     * @param  $AuthorizationExpires
     * @return void
     */
    public function setAuthorizationExpires($AuthorizationExpires)
    {
        $this->AuthorizationExpires = $AuthorizationExpires;
    }

    /**
     * @return gYearMonth
     */
    public function getAuthorizationExpires()
    {
        return $this->AuthorizationExpires;
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
     * @return gYearMonth
     */
    public function getExpires()
    {
        return $this->Expires;
    }

    /**
     * @param  $Number
     * @return void
     */
    public function setNumber($Number)
    {
        $this->Number = $Number;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->Number;
    }

    /**
     * @param  $Type
     * @return void
     */
    public function setType($Type)
    {
        $this->Type = $Type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }
}
