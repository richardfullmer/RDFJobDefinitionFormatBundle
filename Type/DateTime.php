<?php

/**
 *
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use RDF\JobDefinitionFormatBundle\Exception\UnsupportedOperationException;

/**
 * Represents a specific instant of time. It MUST be a Coordinated Universal
 * Time (UTC) or the time zone MUST be indicated by the offset to UTC. In other
 * words, the time MUST be unique in all time zones around the world. It also
 * allows infinity limits to allow for explicit ‘don't care’ values, i.e., it MUST
 * be finished before ‘anytime’.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DateTime extends \DateTime
{
    const POSITIVE_INFINITY = 'INF';
    const NEGATIVE_INFINITY = '-INF';

    protected $infinity;

    public function __construct($time = 'now', \DateTimeZone $timezone = null)
    {
        if (self::POSITIVE_INFINITY == $time || self::NEGATIVE_INFINITY == $time) {
            $this->infinity = $time;
        } else {
            parent::__construct($time, $timezone);
        }
    }

    public function isInfinity()
    {
        return self::POSITIVE_INFINITY == $this->infinity;
    }

    public function isNegativeInfinity()
    {
        return self::NEGATIVE_INFINITY == $this->infinity;
    }

    public function add($interval)
    {
        if (null !== $this->infinity) {
            throw new UnsupportedOperationException("Cannot add dates with infinity");
        }

        return parent::add($interval);
    }


    public function sub($interval)
    {
        if (null !== $this->infinity) {
            throw new UnsupportedOperationException("Cannot subtract dates with infinity");
        }

        return parent::sub($interval);
    }

    public function diff($datetime2, $absolute = false)
    {
        if (null !== $this->infinity) {
            throw new UnsupportedOperationException("Cannot calculate a diff for dates with infinity");
        }

        return parent::diff($datetime2, $absolute);
    }

    public function modify($modify)
    {
        if (null !== $this->infinity) {
            throw new UnsupportedOperationException("Cannot modify dates with infinity");
        }

        return parent::modify($modify);
    }

    public function format($format)
    {
        if (null !== $this->infinity) {
            return $this->infinity;
        }

        return parent::format($format);
    }

}
