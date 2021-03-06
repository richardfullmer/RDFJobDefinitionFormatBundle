<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use Doctrine\Common\Collections\ArrayCollection;
use RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException;

/**
 * Used to describe a list of ranges of points in time.  More specifically, it describes
 * a list of time spans, which each have a relative start and end.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DateTimeRangeList extends ArrayCollection
{
    /**
     * @param array $elements
     */
    public function __construct(array $elements = array())
    {
        foreach ($elements as $element) {
            $this->add($element);
        }
    }

    /**
     * @param DateTimeRange $value
     * @return bool
     * @throws \RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException
     */
    public function add($value)
    {
        if (!$value instanceof DateTimeRange) {
            throw new InvalidArgumentException('DateTimeRangeList can only hold DateTimeRange objects');
        }

        return parent::add($value);
    }
}
