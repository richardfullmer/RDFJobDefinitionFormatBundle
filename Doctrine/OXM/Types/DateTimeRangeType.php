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
use RDF\JobDefinitionFormatBundle\Type\DateTimeRange;

/**
 * A DateTimeRange is represented by two dateTime or infinity tokens separated
 * by the whitespace “~” whitespace sequence.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DateTimeRangeType extends Type
{
    public function getName()
    {
        return 'JDF.DateTimeRange';
    }

    public function convertToXmlValue($value)
    {
        /** @var \RDF\JobDefinitionFormatBundle\Type\DateTimeRange $value */
        if ($value === null) {
            return null;
        }

        if (!$value instanceof DateTimeRange) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        $dateTimeType = Type::getType('JDF.DateTime');
        $encoded = '';

        if (!$value->hasStart()) {
            $encoded .= '-INF';
        } else {
            $encoded .= $dateTimeType->convertToXmlValue($value->getStart());
        }

        $encoded .= ' ~ ';

        if (!$value->hasEnd()) {
            $encoded .= 'INF';
        } else {
            $encoded .= $dateTimeType->convertToXmlValue($value->getEnd());
        }

        return $encoded;
    }

    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        $values = explode(' ~ ', $value);

        if (!is_array($values)) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        $dateTimeType = Type::getType('JDF.DateTime');
        $start = $values[0];
        $end = $values[1];

        if ($start !== '-INF') {
            $start = $dateTimeType->convertToPHPValue($start);
        } else {
            $start = null;
        }

        if ($end !== 'INF') {
            $end = $dateTimeType->convertToPHPValue($end);
        } else {
            $end = null;
        }

        return new DateTimeRange($start, $end);
    }
}