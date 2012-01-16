<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\URI;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class URITypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\URIType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.URI');
    }

    public function testName()
    {
        $this->assertEquals('JDF.URI', $this->type->getName());
    }

    public function testURIConvertsToXmlValue()
    {
        $URI = new URI('file://myHost/a/c%20äöü%25.pdf');
        $convertedValue = $this->type->convertToXmlValue($URI);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('file://myHost/a/c%20äöü%25.pdf', $convertedValue);
    }

    public function testURIConvertsToPHPValue()
    {
        $input = 'file://myHost/a/c%20äöü%25.pdf';
        $URI = $this->type->convertToPHPValue($input);

        $this->assertTrue($URI instanceof URI);
        $this->assertEquals('file://myHost/a/c%20äöü%25.pdf', $URI->getValue());
    }

}
