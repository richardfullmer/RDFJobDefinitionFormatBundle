<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * XML Attributes of type XYPairRange are used to describe a range of XYPair values. The
 * range "x1 y1 ~ x2 y2" describes the area x1 <= x <= x2 and y1 <= y <= y2. Thus the
 * XYPair "2 3" is within "1 2 ~ 3 4". Note that this implies that both values of the second
 * entry MUST be >= the corresponding values of the first entry. The fol­lowing example is
 * therefore invalid: "1 2 ~ 0 4".
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class XYPairRange
{
    /**
     * @var XYPair
     */
    protected $start;

    /**
     * @var XYPair
     */
    protected $end;

    /**
     * @param XYPair $start
     * @param XYPair $end
     */
    public function __construct(XYPair $start, XYPair $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param XYPair $end
     */
    public function setEnd(XYPair $end)
    {
        $this->end = $end;
    }

    /**
     * @return XYPair
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param XYPair $start
     */
    public function setStart(XYPair $start)
    {
        $this->start = $start;
    }

    /**
     * @return XYPair
     */
    public function getStart()
    {
        return $this->start;
    }
}
