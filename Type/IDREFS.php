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
class IDREFS extends ArrayCollection
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
        if (!$value instanceof IDREF) {
            throw new InvalidArgumentException('IDREFS can only hold IDREF');
        }

        return parent::add($value);
    }
}
