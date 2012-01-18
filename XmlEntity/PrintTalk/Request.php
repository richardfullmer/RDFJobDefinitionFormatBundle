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
use RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\BusinessObject\AbstractBusinessObject;

/**
 * Request
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 *
 * @OXM\XmlEntity(xml="Request")
 */
class Request
{
    /**
     * AbstractBusinessObject
     *
     * @var BusinessObject\AbstractBusinessObject
     *
     * @OXM\XmlElement(type="RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\BusinessObject\AbstractBusinessObject")
     */
    protected $BusinessObject;

    /**
     * @param BusinessObject\AbstractBusinessObject $BusinessObject
     * @return void
     */
    public function setBusinessObject(AbstractBusinessObject $BusinessObject)
    {
        $this->BusinessObject = $BusinessObject;
    }

    /**
     * @return BusinessObject\AbstractBusinessObject
     */
    public function getBusinessObject()
    {
        return $this->BusinessObject;
    }
}
