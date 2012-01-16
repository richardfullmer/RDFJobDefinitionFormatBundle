<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\LabColorType;
use RDF\JobDefinitionFormatBundle\Type\LabColor;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class LabColorTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\LabColorType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.LabColor');
    }

    public function testName()
    {
        $this->assertEquals('JDF.LabColor', $this->type->getName());
    }

    public function testColorConvertsToXmlValue()
    {
        $color = new LabColor(51.9, 12.6, -18.9);
        $convertedValue = $this->type->convertToXmlValue($color);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('51.9 12.6 -18.9', $convertedValue);
    }

    public function testColorConvertsToPHPValue()
    {
        $input = '51.9 12.6 -18.9';
        /** @var \RDF\JobDefinitionFormatBundle\Type\LabColor $color  */
        $color = $this->type->convertToPHPValue($input);

        $this->assertTrue($color instanceof LabColor);
        $this->assertEquals(51.9, $color->getL());
        $this->assertEquals(12.6, $color->getA());
        $this->assertEquals(-18.9, $color->getB());
    }
}
