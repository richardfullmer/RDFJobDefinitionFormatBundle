<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\URL;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class URLTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\URLType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.URL');
    }

    public function testName()
    {
        $this->assertEquals('JDF.URL', $this->type->getName());
    }

    public function testURLConvertsToXmlValue()
    {
        $url = new URL('file://myHost/a/c%20äöü%25.pdf');
        $convertedValue = $this->type->convertToXmlValue($url);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('file://myHost/a/c%20äöü%25.pdf', $convertedValue);
    }

    public function testURLConvertsToPHPValue()
    {
        $input = 'file://myHost/a/c%20äöü%25.pdf';
        $url = $this->type->convertToPHPValue($input);

        $this->assertTrue($url instanceof URL);
        $this->assertEquals('file://myHost/a/c%20äöü%25.pdf', $url->getValue());
    }

}
