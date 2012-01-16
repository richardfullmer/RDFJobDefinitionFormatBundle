<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException;

/**
 * XML Attributes of type shape are used to describe a three dimensional box.
 *
 * A shape is represented as an array of three (positive or zero) numbers — x y z —
 * specifying the Width x, height y and depth z coordinates of the shape, in that order.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class Shape
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
     * @var float
     */
    protected $z;

    /**
     * @param float $x
     * @param float $y
     * @param float $z
     */
    public function __construct($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @param float $x
     */
    public function setX($x)
    {
        if ($x < 0) {
            throw new InvalidArgumentException("Shape X dimension may not be negative");
        }

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
        if ($y < 0) {
            throw new InvalidArgumentException("Shape X dimension may not be negative");
        }

        $this->y = $y;
    }

    /**
     * @return float
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param float $z
     */
    public function setZ($z)
    {
        if ($z < 0) {
            throw new InvalidArgumentException("Shape X dimension may not be negative");
        }

        $this->z = $z;
    }

    /**
     * @return float
     */
    public function getZ()
    {
        return $this->z;
    }

    /**
     * @param Shape $other
     * @return bool
     */
    public function fitsInside(Shape $other)
    {
        return $this->x <= $other->getX() && $this->y <= $other->getY() && $this->z <= $other->getZ();
    }
}
