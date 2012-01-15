<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\DateTime;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DateTimeType;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DateTimeTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DateTimeType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.DateTime');
    }

    public function testName()
    {
        $this->assertEquals('JDF.DateTime', $this->type->getName());
    }

    public function testDateTimeConvertsToXmlValue()
    {
        $date = new DateTime('1999-05-31T18:20:00+0000');
        $convertedValue = $this->type->convertToXmlValue($date);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('1999-05-31T18:20:00+0000', $convertedValue);
    }

    public function testDateTimeInfConvertsToXmlValue()
    {
        $date = new DateTime('INF');
        $convertedValue = $this->type->convertToXmlValue($date);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('INF', $convertedValue);
    }

    public function testDateTimeConvertsToPHPValue()
    {
        $input = '1999-05-31T18:20:00Z';
        /** @var \RDF\JobDefinitionFormatBundle\Type\DateTime $date  */
        $date = $this->type->convertToPHPValue($input);

        $this->assertTrue($date instanceof DateTime);
        $this->assertEquals('1999-05-31T18:20:00Z', $date->format('Y-m-d\TG:i:s\Z'));
    }

    public function testDateTimeInfConvertsToPHPValue()
    {
        $input = '-INF';
        /** @var \RDF\JobDefinitionFormatBundle\Type\DateTime $date  */
        $date = $this->type->convertToPHPValue($input);

        $this->assertTrue($date instanceof DateTime);
        $this->assertEquals('-INF', $date->format(''));
    }
}
