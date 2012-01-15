<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * DurationRange are used to describe a range of time durations. More specifically, it
 * describes a time span that has a relative start and end.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DurationRange
{
    /**
     * @var Duration
     */
    protected $start;

    /**
     * @var Duration
     */
    protected $end;

    /**
     * @param Duration $start
     * @param Duration $end
     */
    public function __construct(Duration $start, Duration $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param Duration $end
     */
    public function setEnd(Duration $end)
    {
        $this->end = $end;
    }

    /**
     * @return Duration
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param Duration $start
     */
    public function setStart(Duration $start)
    {
        $this->start = $start;
    }

    /**
     * @return Duration
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
        return $this->start->isInfinity();
    }

    /**
     * @return bool
     */
    public function hasEnd()
    {
        return $this->end->isInfinity();
    }

}
