<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\ShapeType;
use RDF\JobDefinitionFormatBundle\Type\Shape;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class ShapeTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\LabColorType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.Shape');
    }

    public function testName()
    {
        $this->assertEquals('JDF.Shape', $this->type->getName());
    }

    public function testColorConvertsToXmlValue()
    {
        $shape = new Shape(51.9, 12.6, 18.9);
        $convertedValue = $this->type->convertToXmlValue($shape);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('51.9 12.6 18.9', $convertedValue);
    }

    public function testColorConvertsToPHPValue()
    {
        $input = '51.9 12.6 18.9';
        /** @var \RDF\JobDefinitionFormatBundle\Type\Shape $color  */
        $color = $this->type->convertToPHPValue($input);

        $this->assertTrue($color instanceof Shape);
        $this->assertEquals(51.9, $color->getX());
        $this->assertEquals(12.6, $color->getY());
        $this->assertEquals(18.9, $color->getZ());
    }
}
