<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\DateTimeRange;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DateTimeRangeType;
use RDF\JobDefinitionFormatBundle\Type\DateTimeRangeList;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DateTimeRangeListType;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DateTimeRangeListTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DateTimeRangeListType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.DateTimeRangeList');
    }

    public function testName()
    {
        $this->assertEquals('JDF.DateTimeRangeList', $this->type->getName());
    }

    public function testDateTimeRangeListConvertsToXmlValue()
    {
        $start = new \DateTime('1999-05-31T18:20:00+0000');
        $end = new \DateTime('1999-05-31T18:20:00+0000');
        $range = new DateTimeRange($start, $end);
        $start2 = new \DateTime('2001-05-31T18:20:00+0000');
        $end2 = new \DateTime('2002-05-31T18:20:00+0000');
        $range2 = new DateTimeRange($start2, $end2);

        $list = new DateTimeRangeList(array($range, $range2));
        $convertedValue = $this->type->convertToXmlValue($list);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('1999-05-31T18:20:00+0000 ~ 1999-05-31T18:20:00+0000 2001-05-31T18:20:00+0000 ~ 2002-05-31T18:20:00+0000', $convertedValue);
    }

    public function testDateTimeRangeConvertsToPHPValue()
    {
        $input = '1999-05-31T18:20:00+0000 ~ 1999-05-31T18:20:00+0000 2001-05-31T18:20:00+0000 ~ 2002-05-31T18:20:00+0000';
        /** @var \RDF\JobDefinitionFormatBundle\Type\DateTimeRangeList $list  */
        $list = $this->type->convertToPHPValue($input);

        $this->assertTrue($list instanceof DateTimeRangeList);
        $this->assertCount(2, $list->getDateTimeRanges());
    }
}
