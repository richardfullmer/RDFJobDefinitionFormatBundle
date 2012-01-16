<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\XYPairType;
use RDF\JobDefinitionFormatBundle\Type\XYPair;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class XYPairTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\XYPairType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.XYPair');
    }

    public function testName()
    {
        $this->assertEquals('JDF.XYPair', $this->type->getName());
    }

    public function testColorConvertsToXmlValue()
    {
        $color = new XYPair(51.9, 12.6);
        $convertedValue = $this->type->convertToXmlValue($color);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('51.9 12.6', $convertedValue);
    }

    public function testColorConvertsToPHPValue()
    {
        $input = '51.9 12.6';
        /** @var \RDF\JobDefinitionFormatBundle\Type\XYPair $color  */
        $color = $this->type->convertToPHPValue($input);

        $this->assertTrue($color instanceof XYPair);
        $this->assertEquals(51.9, $color->getX());
        $this->assertEquals(12.6, $color->getY());
    }
}
