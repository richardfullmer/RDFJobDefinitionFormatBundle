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
 * A Print Buyer or a Print Provider sends a Refusal to decline receipt of a Business Object.
 *
 * If a Print Buyer chooses to decline a Quotation sent by a Print Provider, or if a Print Provider chooses to decline
 * either an RFQ or a PurchaseOrder sent by a Print Buyer, it MUST either send a Refusal whose
 * BusinessRefID references the declined Business Object or let the Business Object expire.
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Refusal")
 */
class Refusal extends AbstractBusinessObject
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
    private $Contact;

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
