<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * XML Attributes of type RectangleRange are used to describe a range of rectangles.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class RectangleRange
{
    /**
     * @var Rectangle
     */
    protected $start;

    /**
     * @var Rectangle
     */
    protected $end;

    /**
     * @param Rectangle $start
     * @param Rectangle $end
     */
    public function __construct(Rectangle $start, Rectangle $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param Rectangle $end
     */
    public function setEnd(Rectangle $end)
    {
        $this->end = $end;
    }

    /**
     * @return Rectangle
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param Rectangle $start
     */
    public function setStart(Rectangle $start)
    {
        $this->start = $start;
    }

    /**
     * @return Rectangle
     */
    public function getStart()
    {
        return $this->start;
    }

}
