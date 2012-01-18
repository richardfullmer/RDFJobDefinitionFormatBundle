<?php

/*
 * This file is part of the RDFJobDefinitionFormatBundle package.
 *
 * (c) Richard Fullmer <http://github.com/richardfullmer>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\BusinessObject;

use Doctrine\OXM\Mapping as OXM;
use RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Contact;

/**
 * If a Print Provider accepts a PurchaseOrder, it MUST send a
 * Confirmation whose BusinessRefID references the accepted PurchaseOrder.
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Confirmation")
 */
class Confirmation extends AbstractBusinessObject
{
    /**
     * Detailed contact information about the company.
     *
     * @var RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Contact
     *
     * @deprecated  starting with PrintTalk 1.3, the [cXML]
     *              PrintTalk/Header specifies all necessary
     *              credentials.
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Contact")
     */
    protected $Contact;

    /**
     * @param Contact $Contact
     * @return void
     */
    public function setContact(Contact $Contact)
    {
        $this->Contact = $Contact;
    }

    /**
     * @return RDF\JobDefinitionFormatBundle\XmlEntity\JDF\Resource\Contact
     */
    public function getContact()
    {
        return $this->Contact;
    }
}
