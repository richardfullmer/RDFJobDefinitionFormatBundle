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
class LanguagesTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IDREFSType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.Languages');
    }

    public function testName()
    {
        $this->assertEquals('JDF.Languages', $this->type->getName());
    }

    public function testIntegerListConvertsToXmlValue()
    {
        $arg1 = 'de-CH';
        $arg2 = 'de';

        $list = array($arg1, $arg2);
        $convertedValue = $this->type->convertToXmlValue($list);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('de-CH de', $convertedValue);
    }

    public function testDoubleListConvertsToPHPValue()
    {
        $input = 'de-CH de';
        $list = $this->type->convertToPHPValue($input);

        $this->assertCount(2, $list);
        $this->assertEquals(array('de-CH', 'de'), $list);
    }
}
