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
use RDF\JobDefinitionFormatBundle\Type\DoubleRange;

/**
 * A DoubleRange is represented by two double values separated
 * by a “~” (tilde) character and OPTIONAL additional whitespace.
 *
 * Note: It is now RECOMMENDED that the ‘~’ is surrounded by whitespace to
 * aid validation and parsing.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DoubleRangeType extends Type
{
    public function getName()
    {
        return 'JDF.DoubleRange';
    }

    public function convertToXmlValue($range)
    {
        /** @var \RDF\JobDefinitionFormatBundle\Type\DoubleRange $range */
        if ($range === null) {
            return null;
        }

        if (!$range instanceof DoubleRange) {
            throw ConversionException::conversionFailed($range, $this->getName());
        }

        $dateTimeType = Type::getType('JDF.Double');

        return implode(' ~ ', array(
            $dateTimeType->convertToXmlValue($range->getStart()),
            $dateTimeType->convertToXmlValue($range->getEnd())
        ));
    }

    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        $values = explode('~', $value);

        if (!is_array($values)) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        $dateTimeType = Type::getType('JDF.Double');
        $start = trim($values[0]);
        $end = trim($values[1]);

        return new DoubleRange($dateTimeType->convertToPHPValue($start), $dateTimeType->convertToPHPValue($end));
    }
}