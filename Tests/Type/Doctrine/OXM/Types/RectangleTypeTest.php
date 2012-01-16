<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Doctrine\OXM\Types;

use RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\RectangleType;
use RDF\JobDefinitionFormatBundle\Type\Rectangle;
use Doctrine\OXM\Types\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class RectangleTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types\RectangleType
     */
    protected $type;

    protected function setUp()
    {
        $this->type = Type::getType('JDF.Rectangle');
    }

    public function testName()
    {
        $this->assertEquals('JDF.Rectangle', $this->type->getName());
    }

    public function testColorConvertsToXmlValue()
    {
        $color = new Rectangle(0, 0, 3.14, 21631.3);
        $convertedValue = $this->type->convertToXmlValue($color);

        $this->assertInternalType('string', $convertedValue);
        $this->assertEquals('0 0 3.14 21631.3', $convertedValue);
    }

    public function testColorConvertsToPHPValue()
    {
        $input = '0 0 3.14 21631.3';
        /** @var \RDF\JobDefinitionFormatBundle\Type\Rectangle $color  */
        $color = $this->type->convertToPHPValue($input);

        $this->assertTrue($color instanceof Rectangle);
        $this->assertEquals(0, $color->getLlx());
        $this->assertEquals(0, $color->getLly());
        $this->assertEquals(3.14, $color->getUrx());
        $this->assertEquals(21631.3, $color->getUry());
    }
}
