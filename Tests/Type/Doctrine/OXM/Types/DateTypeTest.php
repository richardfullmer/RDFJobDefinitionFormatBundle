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
class DateTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DateTimeType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.Date');
    }

    public function testName()
    {
        $this->assertEquals('JDF.Date', $this->type->getName());
    }

    public function testDateTimeConvertsToXmlValue()
    {
        $date = new DateTime('1999-05-31');
        $convertedValue = $this->type->convertToXmlValue($date);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('1999-05-31', $convertedValue);
    }

    public function testDateTimeConvertsToPHPValue()
    {
        $input = '1999-05-31';
        /** @var \RDF\JobDefinitionFormatBundle\Type\DateTime $date  */
        $date = $this->type->convertToPHPValue($input);

        $this->assertTrue($date instanceof DateTime);
        $this->assertEquals('1999-05-31', $date->format('Y-m-d'));
    }

}
