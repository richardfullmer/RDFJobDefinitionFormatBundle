<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\DateTimeRange;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DateTimeRangeType;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DateTimeRangeTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\CMYKColorType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.DateTimeRange');
    }

    public function testName()
    {
        $this->assertEquals('JDF.DateTimeRange', $this->type->getName());
    }

    public function testDateTimeRangeConvertsToXmlValue()
    {
        $start = new \DateTime('1999-05-31T18:20:00+0000');
        $end = new \DateTime('1999-05-31T18:20:00+0000');
        $range = new DateTimeRange($start, $end);
        $convertedValue = $this->type->convertToXmlValue($range);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('1999-05-31T18:20:00+0000 ~ 1999-05-31T18:20:00+0000', $convertedValue);
    }

    public function testDateTimeRangeConvertsToPHPValue()
    {
        $input = '1999-05-31T18:20:00Z ~ 1999-05-31T18:20:00Z';
        /** @var \RDF\JobDefinitionFormatBundle\Type\DateTimeRange $range  */
        $range = $this->type->convertToPHPValue($input);

        $this->assertTrue($range instanceof DateTimeRange);
        $this->assertEquals('1999-05-31T18:20:00Z', $range->getStart()->format('Y-m-d\TG:i:s\Z'));
        $this->assertEquals('1999-05-31T18:20:00Z', $range->getEnd()->format('Y-m-d\TG:i:s\Z'));
    }
}
