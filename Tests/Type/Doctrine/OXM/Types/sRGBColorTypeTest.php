<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\sRGBColorType;
use RDF\JobDefinitionFormatBundle\Type\sRGBColor;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class sRGBColorTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\sRGBColorType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.sRGBColor');
    }

    public function testName()
    {
        $this->assertEquals('JDF.sRGBColor', $this->type->getName());
    }

    public function testColorConvertsToXmlValue()
    {
        $color = new sRGBColor(0.3, 0.6, 0.8);
        $convertedValue = $this->type->convertToXmlValue($color);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('0.3 0.6 0.8', $convertedValue);
    }

    public function testColorConvertsToPHPValue()
    {
        $input = '0.3 0.6 0.8';
        /** @var \RDF\JobDefinitionFormatBundle\Type\sRGBColor $color  */
        $color = $this->type->convertToPHPValue($input);

        $this->assertTrue($color instanceof sRGBColor);
        $this->assertEquals(0.3, $color->getRed());
        $this->assertEquals(0.6, $color->getGreen());
        $this->assertEquals(0.8, $color->getBlue());
    }
}
