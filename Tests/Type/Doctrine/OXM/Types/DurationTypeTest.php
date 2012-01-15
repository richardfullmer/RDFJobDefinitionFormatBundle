<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DurationType;
use RDF\JobDefinitionFormatBundle\Type\Duration;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DurationTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DurationType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.Duration');
    }

    public function testName()
    {
        $this->assertEquals('JDF.Duration', $this->type->getName());
    }

    public function testDoubleConvertsToXmlValue()
    {
        $duration = new Duration('P3Y6M4DT12H30M5S');
        $convertedValue = $this->type->convertToXmlValue($duration);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('P3Y6M4DT12H30M5S', $convertedValue);
    }

    public function testDoubleConvertsToPHPValue()
    {
        $input = 'P3Y6M4DT12H30M5S';
        /** @var \RDF\JobDefinitionFormatBundle\Type\Duration $duration  */
        $duration = $this->type->convertToPHPValue($input);

        $this->assertTrue($duration instanceof Duration);
        $this->assertEquals('P3Y6M4DT12H30M5S', $duration->format(Duration::FORMAT));
    }
}
