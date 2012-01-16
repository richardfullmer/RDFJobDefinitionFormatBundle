<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * XML Attributes of type XYPair are used to describe sizes like Dimensions and StartPosition.
 * They can also be used to describe positions on a page. All numbers that describe lengths are defined in points.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class XYPair
{
    /**
     * @var float
     */
    protected $x;

    /**
     * @var float
     */
    protected $y;

    /**
     * @param float $x
     * @param float $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param float $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return float
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param float $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return float
     */
    public function getY()
    {
        return $this->y;
    }
}
