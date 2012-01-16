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
class HexBinaryTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\HexBinaryType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.HexBinary');
    }

    public function testName()
    {
        $this->assertEquals('JDF.HexBinary', $this->type->getName());
    }

    public function testDateTimeConvertsToXmlValue()
    {
        $id = '0A1C';
        $convertedValue = $this->type->convertToXmlValue($id);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('0A1C', $convertedValue);
    }

    public function testDateTimeConvertsToPHPValue()
    {
        $input = '0A1C';
        $id = $this->type->convertToPHPValue($input);

        $this->assertEquals('0A1C', $id);
    }

}
