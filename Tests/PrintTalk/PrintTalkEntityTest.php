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

namespace RDF\JobDefinitionFormatBundle\Tests\PrintTalk;

use Doctrine\OXM\Configuration;
use Doctrine\OXM\Mapping\Driver\AnnotationDriver;
use Doctrine\OXM\Mapping\ClassMetadataFactory;
use Doctrine\OXM\Marshaller\XmlMarshaller;

use RDF\JobDefinitionFormatBundle\XmlEntity\PrintTalk\PrintTalk;
 
class PrintTalkEntityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Doctrine\OXM\Marshaller\XmlMarshaller
     */
    protected $marshaller;

    static public function setUpBeforeClass()
    {
        \Doctrine\OXM\Types\Type::addType('jdfdatetime', "RDF\\JobDefinitionFormatBundle\\Types\\JDFDateTimeType");
    }

    public function setUp()
    {        
        $config = new Configuration();
        $config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__."/../../XmlEntity"));
        $config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache());

        $metadataFactory = new ClassMetadataFactory($config);

        $this->marshaller = new XmlMarshaller($metadataFactory);
    }

    public function testPrintTalkMarshalling()
    {
        $pt = new PrintTalk();

        $xml = $this->marshaller->marshalToString($pt);

        $this->assertXmlStringEqualsXmlString('<?xml version="1.0" encoding="UTF-8"?>
                <PrintTalk xmlns="http://www.printtalk.org/schema_13" version="1.3"/>', $xml);
    }

    public function testUnmarshalRFQExample()
    {
        $pt = $this->marshaller->unmarshalFromStream("file://" . realpath(__DIR__ . "/examples/RFQ.xml"));
    }
    
//    public function testUnmarshalQuotationExample()
//    {
//        $pt = $this->marshaller->unmarshalFromStream("file://" . realpath(__DIR__ . "/../examples/Quotation.xml"));
//    }
}
