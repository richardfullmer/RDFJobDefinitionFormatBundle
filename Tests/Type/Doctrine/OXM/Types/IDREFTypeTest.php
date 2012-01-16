<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\IDREF;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class IDREFTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IDType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.IDREF');
    }

    public function testName()
    {
        $this->assertEquals('JDF.IDREF', $this->type->getName());
    }

    public function testIDREFConvertsToXmlValue()
    {
        $id = new IDREF('R-105');
        $convertedValue = $this->type->convertToXmlValue($id);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('R-105', $convertedValue);
    }

    public function testIDREFConvertsToPHPValue()
    {
        $input = 'R-105';
        $id = $this->type->convertToPHPValue($input);

        $this->assertTrue($id instanceof IDREF);
        $this->assertEquals('R-105', $id->getValue());
    }

}
