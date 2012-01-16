<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Type;

/**
 * Coordinate transformation matrices are widely used throughout the whole printing
 * Process, especially in Layout Resources. They represent two dimensional transformations
 * as defined by [PS] and [PDF1.6]. For more information, refer to the respective reference
 * manuals, and look for “Coordinate Systems and Transformations.” The “identity matrix”,
 * which is “1 0 0 1 0 0”, is often used as a default throughout this specification. When
 * another matrix is fac­tored against a matrix with the identity matrix value, the result is
 * that the original matrix remains unchanged.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class Matrix
{
    /**
     * @var float
     */
    protected $a;

    /**
     * @var float
     */
    protected $b;

    /**
     * @var float
     */
    protected $c;

    /**
     * @var float
     */
    protected $d;

    /**
     * @var float
     */
    protected $tx;

    /**
     * @var float
     */
    protected $ty;

    /**
     * @param float $a
     * @param float $b
     * @param float $c
     * @param float $d
     * @param float $tx
     * @param float $ty
     */
    public function __construct($a, $b, $c, $d, $tx, $ty)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->d = $d;
        $this->tx = $tx;
        $this->ty = $ty;
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

    /**
     * @param float $c
     */
    public function setC($c)
    {
        $this->c = $c;
    }

    /**
     * @return float
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * @param float $d
     */
    public function setD($d)
    {
        $this->d = $d;
    }

    /**
     * @return float
     */
    public function getD()
    {
        return $this->d;
    }

    /**
     * @param float $tx
     */
    public function setTx($tx)
    {
        $this->tx = $tx;
    }

    /**
     * @return float
     */
    public function getTx()
    {
        return $this->tx;
    }

    /**
     * @param float $ty
     */
    public function setTy($ty)
    {
        $this->ty = $ty;
    }

    /**
     * @return float
     */
    public function getTy()
    {
        return $this->ty;
    }
}
