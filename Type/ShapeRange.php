<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use RDF\JobDefinitionFormatBundle\Exception\LogicException;

/**
 * XML Attributes of type ShapeRange are used to describe a range of shapes (three dimensional boxes).
 * The range "x1 y1 z1 ~ x2 y2 z2" describes the area x1 <= x <= x2 and y1 <= y <= y2 and z1 <= z <= z2.
 * Thus the shape "2 3 4" is within "1 2 1 ~ 3 4 4".
 *
 * Note that this implies that all three values of the second entry MUST be >= the corresponding values
 * of the first entry. The following example is therefore invalid: "1 2 1 ~ 0 4 4".
 *
 * A ShapeRange is represented by two shapes, separated by a “~” (tilde) character and OPTIONAL
 * additional whitespace. Note: It is now RECOMMENDED that the ‘~’ is surrounded by whitespace to
 * aid validation and parsing.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class ShapeRange
{
    /**
     * @var Shape
     */
    protected $start;

    /**
     * @var Shape
     */
    protected $end;

    /**
     * @param Shape $start
     * @param Shape $end
     */
    public function __construct(Shape $start, Shape $end)
    {
        if (!$start->fitsInside($end)) {
            throw new LogicException("End does not fit inside start shape");
        }

        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param Shape $end
     */
    public function setEnd(Shape $end)
    {
        $this->end = $end;
    }

    /**
     * @return Shape
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param Shape $start
     */
    public function setStart(Shape $start)
    {
        $this->start = $start;
    }

    /**
     * @return Shape
     */
    public function getStart()
    {
        return $this->start;
    }
}
