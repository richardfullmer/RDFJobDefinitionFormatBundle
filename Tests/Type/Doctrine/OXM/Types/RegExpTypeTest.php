<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\RegExp;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class RegExpTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\IDType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.RegExp');
    }

    public function testName()
    {
        $this->assertEquals('JDF.RegExp', $this->type->getName());
    }

    public function testIDConvertsToXmlValue()
    {
        $regex = new RegExp('Foo({1|2}*)');
        $convertedValue = $this->type->convertToXmlValue($regex);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('Foo({1|2}*)', $convertedValue);
    }

    public function testIDConvertsToPHPValue()
    {
        $input = 'Foo({1|2}*)';
        $regex = $this->type->convertToPHPValue($input);

        $this->assertTrue($regex instanceof RegExp);
        $this->assertEquals('Foo({1|2}*)', $regex->getValue());
    }

}
