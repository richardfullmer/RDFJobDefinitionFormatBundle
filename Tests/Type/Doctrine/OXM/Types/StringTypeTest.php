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
class StringTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\StringType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.String');
    }

    public function testName()
    {
        $this->assertEquals('JDF.String', $this->type->getName());
    }

    public function testDateTimeConvertsToXmlValue()
    {
        $id = 'Test With Space';
        $convertedValue = $this->type->convertToXmlValue($id);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('Test With Space', $convertedValue);
    }

    public function testDateTimeConvertsToPHPValue()
    {
        $input = 'Test With Space';
        $id = $this->type->convertToPHPValue($input);

        $this->assertEquals('Test With Space', $id);
    }

}
