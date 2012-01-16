<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class IDTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IDType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.ID');
    }

    public function testName()
    {
        $this->assertEquals('JDF.ID', $this->type->getName());
    }

    public function testDateTimeConvertsToXmlValue()
    {
        $id = 'R-105';
        $convertedValue = $this->type->convertToXmlValue($id);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('R-105', $convertedValue);
    }

    public function testDateTimeConvertsToPHPValue()
    {
        $input = 'R-105';
        $id = $this->type->convertToPHPValue($input);

        $this->assertEquals('R-105', $id);
    }

}
