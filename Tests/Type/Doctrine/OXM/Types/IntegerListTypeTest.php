<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\Integer;
use RDF\JobDefinitionFormatBundle\Type\IntegerList;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IntegerType;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IntegerListType;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class IntegerListTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IntegerListType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.IntegerList');
    }

    public function testName()
    {
        $this->assertEquals('JDF.IntegerList', $this->type->getName());
    }

    public function testIntegerListConvertsToXmlValue()
    {
        $arg1 = new Integer(10);
        $arg2 = new Integer('INF');

        $list = new IntegerList(array($arg1, $arg2));
        $convertedValue = $this->type->convertToXmlValue($list);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('10 INF', $convertedValue);
    }

    public function testDoubleListConvertsToPHPValue()
    {
        $input = '10 INF';
        /** @var \RDF\JobDefinitionFormatBundle\Type\IntegerList $list  */
        $list = $this->type->convertToPHPValue($input);

        $this->assertTrue($list instanceof IntegerList);
        $this->assertCount(2, $list);
    }
}
