<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use Doctrine\Common\Collections\ArrayCollection;
use RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException;

/**
 * XML Attributes of type TransferFunction are functions that have a one-dimensional input
 * and output. In JDF, they are encoded as a simple kind of sampled functions and used to describe
 * transfer curves of image transfer Processes from one medium to the next, (e.g., film to plate,
 * or plate to press).
 *
 * A transfer curve consists of a series of XY pairs where each pair consist of the stimuli (X)
 * and the resulting value (Y). To calculate the result of a certain stimuli, the following
 * algorithms MUST be applied:
 *
 * 1   If x < = first stimuli, then the result is the y value of the first xy pair.
 * 2   If x > = the last stimuli, then the result is the y value of the last xy pair.
 * 3   Search the interval in which x is located.
 * 4   Return the linear interpolated value of x within that interval.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class TransferFunction extends ArrayCollection
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
}
