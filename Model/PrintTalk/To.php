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
     * @var \RDF\JobDefinitionFormatBundle\Model\PrintTalk\Credential[]
     *
     * @OXM\XmlElement(name="Credential", type="RDF\JobDefinitionFormatBundle\Model\PrintTalk\Credential", collection=true)
     */
    protected $Credentials;

    /**
     * @param \RDF\JobDefinitionFormatBundle\Model\PrintTalk\Credential[] $Credentials
     * @return void
     */
    public function setCredentials(array $Credentials)
    {
        foreach ($Credentials as $Credential) {
            $this->addCredential($Credential);
        }
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Model\PrintTalk\Credential $Credential
     * @return void
     */
    public function addCredential(Credential $Credential)
    {
        $this->Credentials[] = $Credential;
    }

    /**
     * @return \RDF\JobDefinitionFormatBundle\Model\PrintTalk\Credential[]
     */
    public function getCredentials()
    {
        return $this->Credentials;
    }
}
