<?php

/*
 * This file is part of the RDFJobDefinitionFormatBundle package.
 *
 * (c) Richard Fullmer <http://github.com/richardfullmer>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RDF\JobDefinitionFormatBundle\Model\PrintTalk\BusinessObject;

use Doctrine\OXM\Mapping as OXM;
use RDF\JobDefinitionFormatBundle\Model\JDF\Resource\Contact;

/**
 * A Print Buyer or a Print Provider sends a Cancellation to cancel a previously sent Business Object.
 *
 * For a Print Provider to cancel for a Quotation or Confirmation, it MUST send a Cancellation whose
 * BusinessRefID references the Quotation or Confirmation.
 *
 * For a Print Buyer to cancel for an RFQ or PurchaseOrder, it MUST send to Print Provider a Cancellation
 * whose BusinessRefID references the RFQ or PurchaseOrder.
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Cancellation")
 */
class Cancellation extends AbstractBusinessObject
{
    /**
     * Detailed contact information about the company.
     *
     * @var RDF\JobDefinitionFormatBundle\Model\JDF\Resource\Contact
     *
     * @deprecated  starting with PrintTalk 1.3, the [cXML]
     *              PrintTalk/Header specifies all necessary
     *              credentials.
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\Model\JDF\Resource\Contact")
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
     * @return RDF\JobDefinitionFormatBundle\Model\JDF\Resource\Contact
     */
    public function getContact()
    {
        return $this->Contact;
    }
}
