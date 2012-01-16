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
class LanguageTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\LanguageType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.Language');
    }

    public function testName()
    {
        $this->assertEquals('JDF.Language', $this->type->getName());
    }

    public function testDateTimeConvertsToXmlValue()
    {
        $id = 'de';
        $convertedValue = $this->type->convertToXmlValue($id);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('de', $convertedValue);
    }

    public function testDateTimeConvertsToPHPValue()
    {
        $input = 'de';
        $id = $this->type->convertToPHPValue($input);

        $this->assertEquals('de', $id);
    }

}
