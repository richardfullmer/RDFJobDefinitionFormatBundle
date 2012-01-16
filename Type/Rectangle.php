<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * XML Attributes of type rectangle are used to describe rectangular locations on the page, Sheet
 * or other printable sur­face. A rectangle is represented as an array of four numbers — llx lly urx ury —
 * specifying the lower-left x, lower-left y, upper-right x and upper-right y coordinates of the
 * rectangle, in that order. This is equivalent to the ordering: Left Bottom Right Top. All numbers are
 * defined in points.
 *
 *  To maintain compatibility with PJTF, rectangles are primitive data types and are encoded as
 * a string of four numbers, separated by whitespace: "llx lly urx ury" or "l b r t".
 *
 * Since all numbers are real numbers, any comparison of boxes SHOULD take into account certain rounding
 * errors. For example, different XYPair values MAY be considered equal when all numbers are the same within
 * a range of 1 point.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class Rectangle
{
    /**
     * @var float
     */
    protected $llx;

    /**
     * @var float
     */
    protected $lly;

    /**
     * @var float
     */
    protected $urx;

    /**
     * @var float
     */
    protected $ury;

    /**
     * @param float $llx
     * @param float $lly
     * @param float $urx
     * @param float $ury
     */
    public function __construct($llx, $lly, $urx, $ury)
    {
        $this->llx = $llx;
        $this->lly = $lly;
        $this->urx = $urx;
        $this->ury = $ury;
    }

    /**
     * @param float $llx
     */
    public function setLlx($llx)
    {
        $this->llx = $llx;
    }

    /**
     * @return float
     */
    public function getLlx()
    {
        return $this->llx;
    }

    /**
     * @param float $lly
     */
    public function setLly($lly)
    {
        $this->lly = $lly;
    }

    /**
     * @return float
     */
    public function getLly()
    {
        return $this->lly;
    }

    /**
     * @param float $urx
     */
    public function setUrx($urx)
    {
        $this->urx = $urx;
    }

    /**
     * @return float
     */
    public function getUrx()
    {
        return $this->urx;
    }

    /**
     * @param float $ury
     */
    public function setUry($ury)
    {
        $this->ury = $ury;
    }

    /**
     * @return float
     */
    public function getUry()
    {
        return $this->ury;
    }
}
