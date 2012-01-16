<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\Integer;
use RDF\JobDefinitionFormatBundle\Type\IntegerRange;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IntegerRangeType;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class IntegerRangeTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\CMYKColorType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.IntegerRange');
    }

    public function testName()
    {
        $this->assertEquals('JDF.IntegerRange', $this->type->getName());
    }

    public function testDateTimeRangeConvertsToXmlValue()
    {
        $start = new Integer(10);
        $end = new Integer('INF');
        $range = new IntegerRange($start, $end);
        $convertedValue = $this->type->convertToXmlValue($range);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('10 ~ INF', $convertedValue);
    }

    public function testDateTimeRangeConvertsToPHPValue()
    {
        $input = '10 ~ INF';
        /** @var \RDF\JobDefinitionFormatBundle\Type\IntegerRange $range  */
        $range = $this->type->convertToPHPValue($input);

        $this->assertTrue($range instanceof IntegerRange);
        $this->assertEquals(10, $range->getStart()->getValue());
        $this->assertEquals(Integer::POSITIVE_INFINITY, $range->getEnd()->getValue());
    }
}
