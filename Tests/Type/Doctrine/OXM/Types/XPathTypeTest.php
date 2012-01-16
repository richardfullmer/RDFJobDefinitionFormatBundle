<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\XPath;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class XPathTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IDType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.XPath');
    }

    public function testName()
    {
        $this->assertEquals('JDF.XPath', $this->type->getName());
    }

    public function testIDConvertsToXmlValue()
    {
        $regex = new XPath('JDF/AuditPool/Created/@TimeStamp');
        $convertedValue = $this->type->convertToXmlValue($regex);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('JDF/AuditPool/Created/@TimeStamp', $convertedValue);
    }

    public function testIDConvertsToPHPValue()
    {
        $input = 'JDF/AuditPool/Created/@TimeStamp';
        $regex = $this->type->convertToPHPValue($input);

        $this->assertTrue($regex instanceof XPath);
        $this->assertEquals('JDF/AuditPool/Created/@TimeStamp', $regex->getValue());
    }

}
