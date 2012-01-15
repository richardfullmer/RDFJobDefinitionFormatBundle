<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\Double;
use RDF\JobDefinitionFormatBundle\Type\DoubleList;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DoubleType;
use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DoubleListType;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DoubleListTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\DoubleListType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.DoubleList');
    }

    public function testName()
    {
        $this->assertEquals('JDF.DoubleList', $this->type->getName());
    }

    public function testDoubleListConvertsToXmlValue()
    {
        $arg1 = new Double(3.14);
        $arg2 = new Double('INF');

        $list = new DoubleList(array($arg1, $arg2));
        $convertedValue = $this->type->convertToXmlValue($list);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('3.14 INF', $convertedValue);
    }

    public function testDoubleListConvertsToPHPValue()
    {
        $input = '3.14 INF';
        /** @var \RDF\JobDefinitionFormatBundle\Type\DoubleList $list  */
        $list = $this->type->convertToPHPValue($input);

        $this->assertTrue($list instanceof DoubleList);
        $this->assertCount(2, $list);
    }
}
