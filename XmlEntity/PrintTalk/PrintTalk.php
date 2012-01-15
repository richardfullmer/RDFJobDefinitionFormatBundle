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
 * The Root Element in a PrintTalk Document MUST be an Element whose type is
 * "PrintTalk"
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlRootEntity(xml="PrintTalk")
 * @OXM\XmlNamespace(url="http://www.printtalk.org/schema_13")
 */
class PrintTalk
{
    /**
     * The version of PrintTalk.  The current release is "1.3"
     *
     * @var string
     *
     * @OXM\XmlAttribute(type="string")
     */
    private $version = "1.3";

    /**
     * From cXML:  A unique number with respect to space and time, used for logging
     * purposes to identify documents that might have been lost or had problems.
     * This value SHOULD not change for retry attempts.
     *
     * @var string
     *
     * @OXM\XmlAttribute(name="payloadID", type="string")
     */
    private $payloadID;

    /**
     * From cXML:  The date and time the message was sent, in ISO8601 format.
     * TimeStamp MUST NOT change for retry attempts.
     *
     * @var \DateTime
     *
     * @OXM\XmlAttribute(name="Timestamp", type="JDF.DateTime")
     */
    private $Timestamp;

    /**
     * The Header defined in cXML. {@see \RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Header}
     *
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Header
     *
     * @OXM\XmlElement(name="Header", type="RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Header")
     */
    private $Header;

    /**
     * The Request defined in cXML and as futhre specified in this document
     *
     * @var \RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Request
     *
     * @OXM\XmlElement(name="Request", type="RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\Request")
     */
    private $Request;

    /**
     * @param Header $Header
     * @return void
     */
    public function setHeader(Header $Header)
    {
        $this->Header = $Header;
    }

    /**
     * @return Header
     */
    public function getHeader()
    {
        return $this->Header;
    }

    /**
     * @param Request $Request
     * @return void
     */
    public function setRequest(Request $Request)
    {
        $this->Request = $Request;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->Request;
    }

    /**
     * @param \DateTime $Timestamp
     * @return void
     */
    public function setTimestamp(\DateTime $Timestamp)
    {
        $this->Timestamp = $Timestamp;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->Timestamp;
    }

    /**
     * @param string $payloadID
     * @return void
     */
    public function setPayloadID($payloadID)
    {
        $this->payloadID = $payloadID;
    }

    /**
     * @return string
     */
    public function getPayloadID()
    {
        return $this->payloadID;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}
