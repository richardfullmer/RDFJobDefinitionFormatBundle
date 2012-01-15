<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * Represents a time span that has an absolute start and end.  Unbounded ranges may be represented
 * by not specifying either the start or end, but not both.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DateTimeRange
{
    /**
     * @var DateTime
     */
    protected $start;

    /**
     * @var\DateTime
     */
    protected $end;

    /**
     * @param DateTime $start
     * @param DateTime $end
     */
    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param DateTime $end
     */
    public function setEnd(DateTime $end)
    {
        $this->end = $end;
    }

    /**
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param DateTime $start
     */
    public function setStart(DateTime $start)
    {
        $this->start = $start;
    }

    /**
     * @return DateTime
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
        return !$this->start->isNegativeInfinity();
    }

    /**
     * @return bool
     */
    public function hasEnd()
    {
        return !$this->end->isInfinity();
    }

}
