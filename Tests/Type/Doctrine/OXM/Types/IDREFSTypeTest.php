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
class IDREFSTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IDREFSType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.IDREFS');
    }

    public function testName()
    {
        $this->assertEquals('JDF.IDREFS', $this->type->getName());
    }

    public function testIntegerListConvertsToXmlValue()
    {
        $arg1 = 'R-12';
        $arg2 = 'R-16';

        $list = array($arg1, $arg2);
        $convertedValue = $this->type->convertToXmlValue($list);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('R-12 R-16', $convertedValue);
    }

    public function testDoubleListConvertsToPHPValue()
    {
        $input = 'R-12 R-16';
        $list = $this->type->convertToPHPValue($input);

        $this->assertCount(2, $list);
        $this->assertEquals(array('R-12', 'R-16'), $list);
    }
}
