<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use RDF\JobDefinitionFormatBundle\Exception\LogicException;

/**
 * Represents a time span that has an absolute start and end.  Unbounded ranges may be represented
 * by not specifying either the start or end, but not both.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DateTimeRange
{
    /**
     * @var \DateTime|null
     */
    protected $start;

    /**
     * @var \DateTime|null
     */
    protected $end;

    /**
     * @param \DateTime|null $start
     * @param \DateTime|null $end
     */
    public function __construct(\DateTime $start = null, \DateTime $end = null)
    {
        if (null === $start && null === $end) {
            throw new LogicException("DateTimeRanges require either a start or an end");
        }

        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd(\DateTime $end)
    {
        $this->end = $end;
    }

    /**
     * @return \DateTime|null
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart(\DateTime $start)
    {
        $this->start = $start;
    }

    /**
     * @return \DateTime|null
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
        return $this->start !== null;
    }

    /**
     * @return bool
     */
    public function hasEnd()
    {
        return $this->end !== null;
    }

}
