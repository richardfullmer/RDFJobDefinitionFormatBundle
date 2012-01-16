<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\Shape;
use RDF\JobDefinitionFormatBundle\Type\ShapeRange;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\ShapeRangeType;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class ShapeRangeTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\CMYKColorType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.ShapeRange');
    }

    public function testName()
    {
        $this->assertEquals('JDF.ShapeRange', $this->type->getName());
    }

    public function testDateTimeRangeConvertsToXmlValue()
    {
        $start = new Shape(1, 2, 3);
        $end = new Shape(4, 5, 6);
        $range = new ShapeRange($start, $end);
        $convertedValue = $this->type->convertToXmlValue($range);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('1 2 3 ~ 4 5 6', $convertedValue);
    }

    public function testDateTimeRangeConvertsToPHPValue()
    {
        $input = '1 2 3 ~ 4 5 6';
        /** @var \RDF\JobDefinitionFormatBundle\Type\ShapeRange $range  */
        $range = $this->type->convertToPHPValue($input);

        $this->assertTrue($range instanceof ShapeRange);
        $this->assertEquals(1, $range->getStart()->getX());
        $this->assertEquals(5, $range->getEnd()->getY());
    }
}
