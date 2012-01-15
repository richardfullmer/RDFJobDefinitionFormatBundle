<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * DoubleRange is used to describe a range of numbers (as doubles.)
 * Mathematically speaking, the two numbers define a closed interval.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DoubleRange
{
    /**
     * @var Double
     */
    protected $start;

    /**
     * @var Double
     */
    protected $end;

    /**
     * @param Double $start
     * @param Double $end
     */
    public function __construct(Double $start, Double $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param Double $end
     */
    public function setEnd(Double $end)
    {
        $this->end = $end;
    }

    /**
     * @return Double
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param Double $start
     */
    public function setStart(Double $start)
    {
        $this->start = $start;
    }

    /**
     * @return Double
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return bool
     */
    public function hasStart()
    {
        return $this->start->isNegativeInfinity();
    }

    /**
     * @return bool
     */
    public function hasEnd()
    {
        return $this->end->isInfinity();
    }

}
