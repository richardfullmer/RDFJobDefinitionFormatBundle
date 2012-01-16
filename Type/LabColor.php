<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * XML Attributes of type LabColor are used to specify absolute Lab colors. The Lab
 * values are normalized to a Light of D50 and an angle of 2 degrees as specified in
 * [CIE 15:2004] and [ISO13655:1996].
 *
 * This corresponds to a white point of X = 0.9642, Y = 1.0000 and Z = 0.8249 in CIEXYZ
 * color space. The value of L is restricted to a range of [0..100]; a and b are unbounded.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class LabColor
{
    /**
     * @var float
     */
    protected $L;

    /**
     * @var float
     */
    protected $a;

    /**
     * @var float
     */
    protected $b;

    /**
     * @param float $L
     * @param float $a
     * @param float $b
     */
    public function __construct($L, $a, $b)
    {
        $this->L = (float) $L;
        $this->a = (float) $a;
        $this->b = (float) $b;
    }

    /**
     * @param float $L
     */
    public function setL($L)
    {
        $this->L = $L;
    }

    /**
     * @return float
     */
    public function getL()
    {
        return $this->L;
    }

    /**
     * @param float $a
     */
    public function setA($a)
    {
        $this->a = $a;
    }

    /**
     * @return float
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @param float $b
     */
    public function setB($b)
    {
        $this->b = $b;
    }

    /**
     * @return float
     */
    public function getB()
    {
        return $this->b;
    }


}
