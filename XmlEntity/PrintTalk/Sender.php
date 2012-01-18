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
 * Sender
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Sender")
 */
class Sender
{
    /**
     * Credential
     *
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Credential[]
     *
     * @OXM\XmlElement(name="Credential", type="RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Credential", collection=true)
     */
    protected $Credentials;

    /**
     * The UserAgent is unique to the Sender element and identifies the software
     * Agent that generated the message
     *
     * @var string
     *
     * @OXM\XmlText(type="string", name="UserAgent")
     */
    protected $UserAgent;

    /**
     * @param \RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Credential[] $Credentials
     * @return void
     */
    public function setCredentials(array $Credentials)
    {
        foreach ($Credentials as $Credential) {
            $this->addCredential($Credential);
        }
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Credential $Credential
     * @return void
     */
    public function addCredential(Credential $Credential)
    {
        $this->Credentials[] = $Credential;
    }

    /**
     * @return \RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Credential[]
     */
    public function getCredentials()
    {
        return $this->Credentials;
    }

    /**
     * @param string $UserAgent
     * @return void
     */
    public function setUserAgent($UserAgent)
    {
        $this->UserAgent = $UserAgent;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->UserAgent;
    }


}
