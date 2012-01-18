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
 * <http://www.opensoftdev.com>.
 */

namespace RDF\JobDefinitionFormatBundle\Tests\XmlEntity\PrintTalk;

use RDF\JobDefinitionFormatBundle\Tests\XmlEntity\MarshallerTestCase;
use RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\PrintTalk;
 
class PrintTalkEntityTest extends MarshallerTestCase
{
    public function testPrintTalkMarshalling()
    {
        $pt = new PrintTalk();

        $xml = self::getMarshaller()->marshalToString($pt);

        $this->assertXmlStringEqualsXmlString('<?xml version="1.0" encoding="UTF-8"?>
                <PrintTalk xmlns="http://www.printtalk.org/schema_13" version="1.3"/>', $xml);
    }

    /**
     * @dataProvider exampleProvider
     */
    public function testMarshalling($source)
    {
        $this->markTestSkipped("JDF OXM Entities not fully loaded yet");

        $source = realpath($source);
        $marshaller = self::getMarshaller();

        $pt = $marshaller->unmarshalFromStream("file://".$source);

        $this->assertNotNull($pt);

        $unmarshalled = $marshaller->marshalToString($pt);

        $this->assertXmlStringEqualsXmlFile($source, $unmarshalled);
    }

    public function exampleProvider()
    {
        return array(
            array(__DIR__ . "/examples/RFQ.xml"),
//            array(__DIR__ . "/examples/Quotation.xml"),  // inf loop?
        );
    }
}
