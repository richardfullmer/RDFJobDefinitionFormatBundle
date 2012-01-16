<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\TransferFunction;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class TransferFunctionTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\TransferFunctionType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.TransferFunction');
    }

    public function testName()
    {
        $this->assertEquals('JDF.TransferFunction', $this->type->getName());
    }

    public function testPDFPathConvertsToXmlValue()
    {
        $list = new TransferFunction(array(0, 0, 0.1, 0.2, 0.5, 0.6, 0.8, 0.9, 1, 1));
        $convertedValue = $this->type->convertToXmlValue($list);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('0 0 0.1 0.2 0.5 0.6 0.8 0.9 1 1', $convertedValue);
    }

    public function testPDFPathConvertsToPHPValue()
    {
        $input = '0 0 .1 .2 .5 .6 .8 .9 1 1';
        $list = $this->type->convertToPHPValue($input);

        $this->assertTrue($list instanceof TransferFunction);
        $this->assertCount(10, $list);
    }
}
