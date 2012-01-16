<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\IDREF;
use RDF\JobDefinitionFormatBundle\Type\IDREFS;
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

    public function testIDREFSConvertsToXmlValue()
    {
        $arg1 = new IDREF('R-12');
        $arg2 = new IDREF('R-16');

        $list = new IDREFS(array($arg1, $arg2));
        $convertedValue = $this->type->convertToXmlValue($list);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('R-12 R-16', $convertedValue);
    }

    public function testIDREFSConvertsToPHPValue()
    {
        $input = 'R-12 R-16';
        $list = $this->type->convertToPHPValue($input);

        $this->assertTrue($list instanceof IDREFS);
        $this->assertCount(2, $list);
    }
}
