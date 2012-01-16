<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IntegerType;
use RDF\JobDefinitionFormatBundle\Type\Integer;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class IntegerTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IntegerType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.Integer');
    }

    public function testName()
    {
        $this->assertEquals('JDF.Integer', $this->type->getName());
    }

    public function testDoubleConvertsToXmlValue()
    {
        $integer = new Integer(10);
        $convertedValue = $this->type->convertToXmlValue($integer);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('10', $convertedValue);
    }

    public function testDoubleConvertsToPHPValue()
    {
        $input = '10';
        /** @var \RDF\JobDefinitionFormatBundle\Type\Integer $integer  */
        $integer = $this->type->convertToPHPValue($input);

        $this->assertTrue($integer instanceof Integer);
        $this->assertEquals(10, $integer->getValue());
    }


    public function testDoubleInfConvertsToXmlValue()
    {
        $color = new Integer(Integer::POSITIVE_INFINITY);
        $convertedValue = $this->type->convertToXmlValue($color);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals(Integer::POSITIVE_INFINITY, $convertedValue);
    }

    public function testDoubleInfConvertsToPHPValue()
    {
        $input = Integer::POSITIVE_INFINITY;
        /** @var \RDF\JobDefinitionFormatBundle\Type\Integer $integer  */
        $integer = $this->type->convertToPHPValue($input);

        $this->assertTrue($integer instanceof Integer);
        $this->assertEquals(Integer::POSITIVE_INFINITY, $integer->getValue());
        $this->assertTrue($integer->isInfinity());
    }
}
