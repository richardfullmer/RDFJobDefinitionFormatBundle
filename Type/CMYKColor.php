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
class CMYKColor
{
    /**
     * @var float
     */
    protected $cyan;

    /**
     * @var float
     */
    protected $magenta;

    /**
     * @var float
     */
    protected $yellow;

    /**
     * @var float
     */
    protected $black;

    /**
     * @param float $cyan
     * @param float $magenta
     * @param float $yellow
     * @param float $black
     */
    public function __construct($cyan, $magenta, $yellow, $black)
    {
        $this->cyan = (float) $cyan;
        $this->magenta = (float) $magenta;
        $this->yellow = (float) $yellow;
        $this->black = (float) $black;
    }

    /**
     * @param float $black
     */
    public function setBlack($black)
    {
        $this->black = (float) $black;
    }

    /**
     * @return float
     */
    public function getBlack()
    {
        return $this->black;
    }

    /**
     * @param float $cyan
     */
    public function setCyan($cyan)
    {
        $this->cyan = (float) $cyan;
    }

    /**
     * @return float
     */
    public function getCyan()
    {
        return $this->cyan;
    }

    /**
     * @param float $magenta
     */
    public function setMagenta($magenta)
    {
        $this->magenta = (float) $magenta;
    }

    /**
     * @return float
     */
    public function getMagenta()
    {
        return $this->magenta;
    }

    /**
     * @param float $yellow
     */
    public function setYellow($yellow)
    {
        $this->yellow = (float) $yellow;
    }

    /**
     * @return float
     */
    public function getYellow()
    {
        return $this->yellow;
    }
}
