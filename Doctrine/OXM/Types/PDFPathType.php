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
use RDF\JobDefinitionFormatBundle\Type\PDFPath;

/**
 * PDFPaths are encoded by restricting an XML string Attribute formatted with PDF path
 * operators. This allows for easy adoption in PS and PDF workflows. PDF operators are
 * limited to those described in “Path Construction Operators” in [PDF1.6].
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class PDFPathType extends Type
{
    public function getName()
    {
        return 'JDF.PDFPath';
    }

    public function convertToXmlValue($pdfCommands)
    {
        /** @var \RDF\JobDefinitionFormatBundle\Type\PDFPath $pdfCommands */
        if ($pdfCommands === null) {
            return null;
        }

        if (!$pdfCommands instanceof PDFPath) {
            throw ConversionException::conversionFailed($pdfCommands, $this->getName());
        }

        return implode(' ', $pdfCommands->toArray());
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

        return new PDFPath($values);
    }
}