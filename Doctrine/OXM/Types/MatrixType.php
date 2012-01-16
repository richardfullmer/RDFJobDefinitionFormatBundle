<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace RDF\JobDefinitionFormatBundle\Doctrine\OXM\Types;

use Doctrine\OXM\Types\Type;
use Doctrine\OXM\Types\ConversionException;
use RDF\JobDefinitionFormatBundle\Type\Matrix;

/**
 * Coordinate transformation matrices are primitive data types and are encoded as a
 * list of six numbers (as doubles), separated by whitespace: “a b c d Tx Ty”. The
 * variables Tx and Ty describe distances and are defined in points.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class MatrixType extends Type
{
    public function getName()
    {
        return 'JDF.Matrix';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\Matrix $matrix
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($matrix)
    {
        if ($matrix === null) {
            return null;
        }

        if (!$matrix instanceof Matrix) {
            throw ConversionException::conversionFailed($matrix, $this->getName());
        }

        return implode(' ', array(
            $matrix->getA(),
            $matrix->getB(),
            $matrix->getC(),
            $matrix->getD(),
            $matrix->getTx(),
            $matrix->getTy(),
        ));
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\Matrix
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        $values = explode(' ', $value);

        if (!is_array($values)) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        return new Matrix($values[0], $values[1], $values[2], $values[3], $values[4], $values[5]);
    }
}