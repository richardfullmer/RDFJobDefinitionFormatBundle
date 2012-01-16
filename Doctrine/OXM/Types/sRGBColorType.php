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
use RDF\JobDefinitionFormatBundle\Type\sRGBColor;

/**
 * sRGBColors are primitive data types and are encoded as a string of three numbers
 * in the range of [0…1.0] separated by whitespace. A value of 0 specifies no intensity
 * (black) and a value of 1 specifies full intensity. The sequence is defined as: “r g b”
 */
class sRGBColorType extends Type
{
    public function getName()
    {
        return 'JDF.sRGBColor';
    }

    /**
     * @param \RDF\JobDefinitionFormatBundle\Type\sRGBColor $color
     * @return null|string
     * @throws \Doctrine\OXM\Types\ConversionException
     */
    public function convertToXmlValue($color)
    {
        if ($color === null) {
            return null;
        }

        if (!$color instanceof sRGBColor) {
            throw ConversionException::conversionFailed($color, $this->getName());
        }

        return implode(' ', array(
            $color->getRed(),
            $color->getGreen(),
            $color->getBlue(),
        ));
    }

    /**
     * @param $value
     * @return null|\RDF\JobDefinitionFormatBundle\Type\sRGBColor
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

        return new sRGBColor($values[0], $values[1], $values[2]);
    }
}