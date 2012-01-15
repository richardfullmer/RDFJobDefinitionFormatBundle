<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\Double;
use RDF\JobDefinitionFormatBundle\Type\DoubleRange;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DoubleRangeType;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DoubleRangeTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\CMYKColorType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.DoubleRange');
    }

    public function testName()
    {
        $this->assertEquals('JDF.DoubleRange', $this->type->getName());
    }

    public function testDateTimeRangeConvertsToXmlValue()
    {
        $start = new Double(3.14);
        $end = new Double('INF');
        $range = new DoubleRange($start, $end);
        $convertedValue = $this->type->convertToXmlValue($range);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('3.14 ~ INF', $convertedValue);
    }

    public function testDateTimeRangeConvertsToPHPValue()
    {
        $input = '3.14 ~ INF';
        /** @var \RDF\JobDefinitionFormatBundle\Type\DoubleRange $range  */
        $range = $this->type->convertToPHPValue($input);

        $this->assertTrue($range instanceof DoubleRange);
        $this->assertEquals(3.14, $range->getStart()->getValue());
        $this->assertEquals(Double::POSITIVE_INFINITY, $range->getEnd()->getValue());
    }
}
