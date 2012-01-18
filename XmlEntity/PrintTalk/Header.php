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
 * The Header Element comes directly from cXML.
 *
 * From cXML:  The <tt>From</tt>, <tt>To</tt>, and <tt>Sender</tt> Elements allow
 * receiving systems to identify and authorize parties.  The <tt>From</tt> and
 * <tt>To</tt> Elements in a document do not change.  However, as the document
 * travels to its destination, intermediate Nodes (such as Ariba Network) may
 * change the <tt>Sender</tt> Element.
 *
 * For example, in the <tt>RFQ</tt>, the <tt>From</tt> part is the Print Buyer.
 * The <tt>To</tt> part is the Print Provider.  In the subsequent <tt>Quotation</tt>,
 * these roles are reversed.  The <tt>Sender</tt> is always the party sending
 * the message.
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Header")
 */
class Header
{
    /**
     * Identifies the originator of the cXML request
     *
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\From
     *
     * @OXM\XmlElement(name="From", type="RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\From")
     */
    protected $From;

    /**
     * Identifies the destination of the cXML request
     *
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\To
     *
     * @OXM\XmlElement(name="To", type="RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\To")
     */
    protected $To;

    /**
     * Allows the receiving party to identify and authenticate the party that
     * opened the HTTP connection.  It contains a stronger authentication
     * <tt>Credential</tt> than the ones in the <tt>From</tt> or <tt>To</tt>
     * Elements, because the receiving party must authenticate who is asking it
     * to perform the work.
     *
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Sender
     *
     * @OXM\XmlElement(name="Sender", type="RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Sender")
     */
    protected $Sender;


    public function setFrom(From $From)
    {
        $this->From = $From;
    }

    public function getFrom()
    {
        return $this->From;
    }

    public function setSender(Sender $Sender)
    {
        $this->Sender = $Sender;
    }

    public function getSender()
    {
        return $this->Sender;
    }

    public function setTo(To $To)
    {
        $this->To = $To;
    }

    public function getTo()
    {
        return $this->To;
    }
}
