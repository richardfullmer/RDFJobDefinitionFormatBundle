<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\XYPair;
use RDF\JobDefinitionFormatBundle\Type\XYPairRange;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\XYPairRangeType;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class XYPairRangeTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\XYPairRangeType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.XYPairRange');
    }

    public function testName()
    {
        $this->assertEquals('JDF.XYPairRange', $this->type->getName());
    }

    public function testDateTimeRangeConvertsToXmlValue()
    {
        $start = new XYPair(1, 2);
        $end = new XYPair(3, 4);
        $range = new XYPairRange($start, $end);
        $convertedValue = $this->type->convertToXmlValue($range);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('1 2 ~ 3 4', $convertedValue);
    }

    public function testDateTimeRangeConvertsToPHPValue()
    {
        $input = '1 2 ~ 3 4';
        /** @var \RDF\JobDefinitionFormatBundle\Type\XYPairRange $range  */
        $range = $this->type->convertToPHPValue($input);

        $this->assertTrue($range instanceof XYPairRange);
        $this->assertEquals(1, $range->getStart()->getX());
        $this->assertEquals(4, $range->getEnd()->getY());
    }
}
