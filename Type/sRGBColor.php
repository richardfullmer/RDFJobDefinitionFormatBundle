<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

use RDF\JobDefinitionFormatBundle\Exception\InvalidArgumentException;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class sRGBColor
{
    /**
     * @var float
     */
    protected $red;

    /**
     * @var float
     */
    protected $green;

    /**
     * @var float
     */
    protected $blue;

    /**
     * @param float $red
     * @param float $green
     * @param float $blue
     */
    public function __construct($red, $green, $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    /**
     * @param float $blue
     */
    public function setBlue($blue)
    {
        if ($blue < 0 || $blue > 1) {
            throw new InvalidArgumentException("Values for blue must be between 0 and 1 inclusive");
        }

        $this->blue = (float) $blue;
    }

    /**
     * @return float
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * @param float $green
     */
    public function setGreen($green)
    {
        if ($green < 0 || $green > 1) {
            throw new InvalidArgumentException("Values for green must be between 0 and 1 inclusive");
        }

        $this->green = (float) $green;
    }

    /**
     * @return float
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * @param float $red
     */
    public function setRed($red)
    {
        if ($red < 0 || $red > 1) {
            throw new InvalidArgumentException("Values for red must be between 0 and 1 inclusive");
        }

        $this->red = (float) $red;
    }

    /**
     * @return float
     */
    public function getRed()
    {
        return $this->red;
    }


}
