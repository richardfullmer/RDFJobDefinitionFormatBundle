<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * Represents a duration of time. Based on [ISO8601:2004]. The single infinity
 * limit token INF is permitted.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class Duration extends \DateInterval
{
    const INFINITY = 'INF';

    const FORMAT = '%rP%yY%mM%dDT%hH%iM%sS';

    protected $infinity;

    public function __construct($interval_spec)
    {
        if (self::INFINITY == $interval_spec) {
            $this->infinity = self::INFINITY;
        } else {
            parent::__construct($interval_spec);
        }
    }

    public function isInfinity()
    {
        return null !== $this->infinity;
    }

    public function format($format)
    {
        if (null !== $this->infinity) {
            return self::INFINITY;
        } else {
            return parent::format($format);
        }
    }
}
