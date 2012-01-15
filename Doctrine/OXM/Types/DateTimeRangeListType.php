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
use RDF\JobDefinitionFormatBundle\Type\DateTimeRangeList;

/**
 * A DateTimeRange is represented by two dateTime or infinity tokens separated
 * by the whitespace “~” whitespace sequence.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class DateTimeRangeListType extends Type
{
    public function getName()
    {
        return 'JDF.DateTimeRangeList';
    }

    public function convertToXmlValue($value)
    {
        /** @var \RDF\JobDefinitionFormatBundle\Type\DateTimeRangeList $value */
        if ($value === null) {
            return null;
        }

        if (!$value instanceof DateTimeRangeList) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        $dateTimeRangeType = Type::getType('JDF.DateTimeRange');
        $encodedValues = array();

        foreach ($value->getDateTimeRanges() as $dateTimeRange) {
            $encodedValues[] = $dateTimeRangeType->convertToXmlValue($dateTimeRange);
        }

        return implode(' ', $encodedValues);
    }

    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        if (!preg_match_all('/[a-zA-Z0-9~\-:\+]* ~ [a-zA-Z0-9~\-:\+]*/', $value, $ranges)) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        $dateTimeRangeType = Type::getType('JDF.DateTimeRange');
        $dateTimeRangeList = new DateTimeRangeList();

        foreach ($ranges[0] as $range) {
            $dateTimeRangeList->addDateTimeRange($dateTimeRangeType->convertToPHPValue($range));
        }

        return $dateTimeRangeList;
    }
}