<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\BooleanType;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class BooleanTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\BooleanType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.Boolean');
    }

    public function testName()
    {
        $this->assertEquals('JDF.Boolean', $this->type->getName());
    }

    public function testColorConvertsToXmlValue()
    {
        $convertedValue = $this->type->convertToXmlValue(true);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('true', $convertedValue);
    }

    public function testColorConvertsToPHPValue()
    {
        $input = 'true';
        $color = $this->type->convertToPHPValue($input);

        $this->assertTrue($color);
    }
}
