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
 * To
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="To")
 */
class To
{
    /**
     * Credential
     *
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Credential[]
     *
     * @OXM\XmlElement(name="Credential", type="RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Credential", collection=true)
     */
    private $Credentials;

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
}
