<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\CMYKColorType;
use RDF\JobDefinitionFormatBundle\Type\CMYKColor;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class CMYKColorTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\CMYKColorType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.CMYKColor');
    }

    public function testName()
    {
        $this->assertEquals('JDF.CMYKColor', $this->type->getName());
    }

    public function testColorConvertsToXmlValue()
    {
        $color = new CMYKColor(0.1, 0.1, 0.1, 0.7);
        $convertedValue = $this->type->convertToXmlValue($color);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('0.1 0.1 0.1 0.7', $convertedValue);
    }

    public function testColorConvertsToPHPValue()
    {
        $input = '0.1 0.3 0.5 0.7';
        /** @var \RDF\JobDefinitionFormatBundle\Type\CMYKColor $color  */
        $color = $this->type->convertToPHPValue($input);

        $this->assertTrue($color instanceof CMYKColor);
        $this->assertEquals(0.1, $color->getCyan());
        $this->assertEquals(0.3, $color->getMagenta());
        $this->assertEquals(0.5, $color->getYellow());
        $this->assertEquals(0.7, $color->getBlack());
    }
}
