<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * IntegerRange are used to describe a range of integers. In some cases, ranges are defined
 * for an unknown number of objects. In these cases, a negative value denotes a number
 * counted from the end. For example, -1 is the last object, -2 the second to last and so on.
 * IntegerRanges that follow this convention are marked in the respective Attribute descriptions.
 *
 * If the first element of an IntegerRange specifies an element that is behind the second element,
 * the Range speci­fies a list of integers in reverse order, counting backwards. For example "6 ~ 4" = "6 5 4"
 * and "-1  ~  0" = “last… 2 1 0”.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class IntegerRange
{
    /**
     * @var Integer
     */
    protected $start;

    /**
     * @var Integer
     */
    protected $end;

    /**
     * @param Integer $start
     * @param Integer $end
     */
    public function __construct(Integer $start, Integer $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param Integer $end
     */
    public function setEnd(Integer $end)
    {
        $this->end = $end;
    }

    /**
     * @return Integer
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param Integer $start
     */
    public function setStart(Integer $start)
    {
        $this->start = $start;
    }

    /**
     * @return Integer
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
