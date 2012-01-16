<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use Doctrine\Common\Collections\ArrayCollection;
use RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException;

/**
 * Variable length list of Integers
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class IntegerList extends ArrayCollection
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
     * @param Integer $value
     * @return bool
     * @throws \RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException
     */
    public function add($value)
    {
        if (!$value instanceof Integer) {
            throw new InvalidArgumentException('IntegerList can only hold Integers');
        }

        return parent::add($value);
    }
}
