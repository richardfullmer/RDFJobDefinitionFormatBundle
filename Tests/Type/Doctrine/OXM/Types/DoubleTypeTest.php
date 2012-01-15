<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DoubleType;
use RDF\JobDefinitionFormatBundle\Type\Double;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DoubleTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DoubleType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.Double');
    }

    public function testName()
    {
        $this->assertEquals('JDF.Double', $this->type->getName());
    }

    public function testDoubleConvertsToXmlValue()
    {
        $color = new Double(0.1);
        $convertedValue = $this->type->convertToXmlValue($color);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('0.1', $convertedValue);
    }

    public function testDoubleConvertsToPHPValue()
    {
        $input = '0.1';
        /** @var \RDF\JobDefinitionFormatBundle\Type\Double $double  */
        $double = $this->type->convertToPHPValue($input);

        $this->assertTrue($double instanceof Double);
        $this->assertEquals(0.1, $double->getValue());
    }


    public function testDoubleInfConvertsToXmlValue()
    {
        $color = new Double(Double::POSITIVE_INFINITY);
        $convertedValue = $this->type->convertToXmlValue($color);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals(Double::POSITIVE_INFINITY, $convertedValue);
    }

    public function testDoubleInfConvertsToPHPValue()
    {
        $input = Double::POSITIVE_INFINITY;
        /** @var \RDF\JobDefinitionFormatBundle\Type\Double $double  */
        $double = $this->type->convertToPHPValue($input);

        $this->assertTrue($double instanceof Double);
        $this->assertEquals(Double::POSITIVE_INFINITY, $double->getValue());
        $this->assertTrue($double->isInfinity());
    }
}
