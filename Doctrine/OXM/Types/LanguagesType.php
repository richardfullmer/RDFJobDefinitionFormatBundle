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
use RDF\JobDefinitionFormatBundle\Type\Double;
use RDF\JobDefinitionFormatBundle\Type\DoubleList;

/**
 * XML Attributes of type languages are used to describe a variable length list of language values.
 *
 * A languages value is encoded as a string of languages, each language separated by whitespace.
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class LanguagesType extends Type
{
    public function getName()
    {
        return 'JDF.Languages';
    }

    public function convertToXmlValue($items)
    {
        /** @var array $items */
        if ($items === null) {
            return null;
        }

        $languageType = Type::getType('JDF.Language');
        $encodedValues = array();

        foreach ($items as $item) {
            $encodedValues[] = $languageType->convertToXmlValue($item);
        }

        return implode(' ', $encodedValues);
    }

    public function convertToPHPValue($value)
    {
        if ($value === null) {
            return null;
        }

        $values = explode(' ', $value);

        if (!is_array($values)) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        $languageType = Type::getType('JDF.Language');
        $list = array();

        foreach ($values as $value) {
            $list[] = $languageType->convertToPHPValue($value);
        }

        return $list;
    }
}