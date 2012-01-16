<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\NMTOKEN;
use RDF\JobDefinitionFormatBundle\Type\NMTOKENS;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class NMTOKENSTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\NMTOKENSType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.NMTOKENS');
    }

    public function testName()
    {
        $this->assertEquals('JDF.NMTOKENS', $this->type->getName());
    }

    public function testNMTOKENSConvertsToXmlValue()
    {
        $arg1 = new NMTOKEN('R-12');
        $arg2 = new NMTOKEN('R-16');

        $list = new NMTOKENS(array($arg1, $arg2));
        $convertedValue = $this->type->convertToXmlValue($list);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('R-12 R-16', $convertedValue);
    }

    public function testNMTOKENSConvertsToPHPValue()
    {
        $input = 'R-12 R-16';
        $list = $this->type->convertToPHPValue($input);

        $this->assertTrue($list instanceof NMTOKENS);
        $this->assertCount(2, $list);
    }
}
