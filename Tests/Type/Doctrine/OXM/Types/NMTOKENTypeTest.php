<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\NMTOKEN;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class NMTOKENTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\NMTOKENType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.NMTOKEN');
    }

    public function testName()
    {
        $this->assertEquals('JDF.NMTOKEN', $this->type->getName());
    }

    public function testDateTimeConvertsToXmlValue()
    {
        $token = new NMTOKEN('ABC_6');
        $convertedValue = $this->type->convertToXmlValue($token);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('ABC_6', $convertedValue);
    }

    public function testDateTimeConvertsToPHPValue()
    {
        $input = 'ABC_6';
        $token = $this->type->convertToPHPValue($input);

        $this->assertTrue($token instanceof NMTOKEN);
        $this->assertEquals('ABC_6', $token->getValue());
    }

}
