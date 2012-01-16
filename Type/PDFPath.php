<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use Doctrine\Common\Collections\ArrayCollection;
use RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException;

/**
 * XML Attributes of type PDFPath are used in JDF for describing parameters such as trap
 * zones and clip paths. In PJTF, PDFPaths are encoded as a series of moveto-lineto operations.
 * JDF has a different encoding, which is able to describe more complex paths, such as Bezier
 * curves. The non-zero winding rule is used to fill closed paths.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class PDFPath extends ArrayCollection
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
