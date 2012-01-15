<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\Duration;
use RDF\JobDefinitionFormatBundle\Type\DurationRange;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DurationRangeType;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DurationRangeTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DurationRangeType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.DurationRange');
    }

    public function testName()
    {
        $this->assertEquals('JDF.DurationRange', $this->type->getName());
    }

    public function testDateTimeRangeConvertsToXmlValue()
    {
        $start = new Duration('P1Y2M3DT10H30M0S');
        $end = new Duration('INF');
        $range = new DurationRange($start, $end);
        $convertedValue = $this->type->convertToXmlValue($range);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('P1Y2M3DT10H30M0S ~ INF', $convertedValue);
    }

    public function testDateTimeRangeConvertsToPHPValue()
    {
        $input = 'P1Y2M3DT10H30M0S ~ INF';
        /** @var \RDF\JobDefinitionFormatBundle\Type\DoubleRange $range  */
        $range = $this->type->convertToPHPValue($input);

        $this->assertTrue($range instanceof DurationRange);
        $this->assertEquals('P1Y2M3DT10H30M0S', $range->getStart()->format(Duration::FORMAT));
        $this->assertEquals(Duration::INFINITY, $range->getEnd()->format(Duration::FORMAT));
    }
}
