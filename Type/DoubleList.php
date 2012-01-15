<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use Doctrine\Common\Collections\ArrayCollection;
use RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException;

/**
 * Variable length list of doubles
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DoubleList extends ArrayCollection
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
     * @param Double $value
     * @return bool
     * @throws \RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException
     */
    public function add($value)
    {
        if (!$value instanceof Double) {
            throw new InvalidArgumentException('DoubleList can only hold Doubles');
        }

        return parent::add($value);
    }
}
