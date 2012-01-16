<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\MatrixType;
use RDF\JobDefinitionFormatBundle\Type\Matrix;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class MatrixTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\MatrixType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.Matrix');
    }

    public function testName()
    {
        $this->assertEquals('JDF.Matrix', $this->type->getName());
    }

    public function testColorConvertsToXmlValue()
    {
        $color = new Matrix(1, 0, 0, 1, 3.14, 21631.3);
        $convertedValue = $this->type->convertToXmlValue($color);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('1 0 0 1 3.14 21631.3', $convertedValue);
    }

    public function testColorConvertsToPHPValue()
    {
        $input = '1 0 0 1 3.14 21631.3';
        /** @var \RDF\JobDefinitionFormatBundle\Type\Matrix $matrix  */
        $matrix = $this->type->convertToPHPValue($input);

        $this->assertTrue($matrix instanceof Matrix);
        $this->assertEquals(1, $matrix->getA());
        $this->assertEquals(0, $matrix->getB());
        $this->assertEquals(0, $matrix->getC());
        $this->assertEquals(1, $matrix->getD());
        $this->assertEquals(3.14, $matrix->getTx());
        $this->assertEquals(21631.3, $matrix->getTy());
    }
}
