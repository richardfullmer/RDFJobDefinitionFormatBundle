<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use RDF\JobDefinitionFormatBundle\Exception\LogicException;

/**
 * Used to describe a list of ranges of points in time.  More specifically, it describes
 * a list of time spans, which each have a relative start and end.
 *
 * @todo implement \Countable, \Traversable, etc...
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DateTimeRangeList
{
    /**
     * @var DateTimeRange[]
     */
    protected $dateTimeRanges;

    /**
     * @param null|DateTimeRange[] $ranges
     */
    public function __construct($ranges = null)
    {
        $this->setDateTimeRanges($ranges);
    }

    /**
     * @return DateTimeRange[]
     */
    public function getDateTimeRanges()
    {
        return $this->dateTimeRanges;
    }

    /**
     * @param null|DateTimeRange[] $ranges
     */
    public function setDateTimeRanges($ranges = null)
    {
        $this->dateTimeRanges = array();
        foreach ($ranges as $range) {
            $this->addDateTimeRange($range);
        }
    }

    /**
     * @param DateTimeRange $range
     */
    public function addDateTimeRange(DateTimeRange $range)
    {
        $this->dateTimeRanges[] = $range;
    }
}
