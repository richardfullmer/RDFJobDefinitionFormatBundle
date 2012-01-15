<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DateTimeRange
{
    const INFINITY_START = 'INF';
    const INFINITY_END = '-INF';

    protected $start;
    protected $end;
}
