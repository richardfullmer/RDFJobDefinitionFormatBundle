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
 * Credential
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Credential")
 */
class Credential
{
    /**
     * Specifies the type of credential.  This Attribute allows documents to
     * contain multiple types of credentials for multiple authentication
     * domains.
     *
     * For messages sent o Ariba Supplier Network, for instance, the domain
     * can be "AribaNetworkUserId" to indicate an email address, DUNS for a
     * D-U-N-S number, or "NetworkId" for a preassigned ID.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string")
     */
    protected $domain;

    /**
     * The text in the Element states who the <tt>Credential</tt> represents.
     *
     * For example, the text might be an email address or some other unique
     * string of characters.
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string")
     */
    protected $type;

    /**
     * @var string
     *
     * @OXM\XmlText(name="Identity", type="string")
     */
    protected $Identity;

    /**
     * @var string
     *
     * @OXM\XmlText(name="SharedSecret", type="string")
     */
    protected $SharedSecret;

    /**
     * @var string
     *
     * @OXM\XmlText(name="CredentialMac", type="string")
     */
    protected $CredentialMac;

    /**
     * @param  $CredentialMac
     * @return void
     */
    public function setCredentialMac($CredentialMac)
    {
        $this->CredentialMac = $CredentialMac;
    }

    /**
     * @return string
     */
    public function getCredentialMac()
    {
        return $this->CredentialMac;
    }

    /**
     * @param  $Identity
     * @return void
     */
    public function setIdentity($Identity)
    {
        $this->Identity = $Identity;
    }

    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this->Identity;
    }

    /**
     * @param  $SharedSecret
     * @return void
     */
    public function setSharedSecret($SharedSecret)
    {
        $this->SharedSecret = $SharedSecret;
    }

    /**
     * @return string
     */
    public function getSharedSecret()
    {
        return $this->SharedSecret;
    }

    /**
     * @param  $domain
     * @return void
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param  $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
