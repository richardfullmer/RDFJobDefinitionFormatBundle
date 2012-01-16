<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Type\PDFPath;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class PDFPathTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\PDFPathType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.PDFPath');
    }

    public function testName()
    {
        $this->assertEquals('JDF.PDFPath', $this->type->getName());
    }

    public function testPDFPathConvertsToXmlValue()
    {
        $list = new PDFPath(array(0, 0, 'm', 10, 10, 'l', 20, 20, 'l'));
        $convertedValue = $this->type->convertToXmlValue($list);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('0 0 m 10 10 l 20 20 l', $convertedValue);
    }

    public function testPDFPathConvertsToPHPValue()
    {
        $input = '0 0 m 10 10 l 20 20 l';
        $list = $this->type->convertToPHPValue($input);

        $this->assertTrue($list instanceof PDFPath);
        $this->assertCount(9, $list);
    }
}
