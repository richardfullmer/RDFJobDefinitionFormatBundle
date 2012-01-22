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

namespace RDF\JobDefinitionFormatBundle\Tests\Model\JDF;

use RDF\JobDefinitionFormatBundle\Tests\Model\MarshallerTestCase;
 
class JDFEntityTest extends MarshallerTestCase
{
    /**
     * @dataProvider exampleProvider
     */
    public function testMarshalling($source)
    {
        $this->markTestSkipped("JDF OXM definitions not yet completed");

        $source = realpath($source);
        $marshaller = self::getMarshaller();

        $jmf = $marshaller->unmarshalFromStream("file://".$source);

        $this->assertNotNull($jmf);

        $unmarshalled = $marshaller->marshalToString($jmf);

        $this->assertXmlStringEqualsXmlFile($source, $unmarshalled);
    }

    public function exampleProvider()
    {
        return array(
//            array(__DIR__ . "/examples/delivery.jdf"),
//            array(__DIR__ . "/examples/digital_delivery.jdf"),
//            array(__DIR__ . "/examples/post_merging.jdf"),
//            array(__DIR__ . "/examples/post_processing.jdf"),
//            array(__DIR__ . "/examples/post_spawning.jdf"),
//            array(__DIR__ . "/examples/pre_processing.jdf"),
//            array(__DIR__ . "/examples/pre_spawning.jdf"),
//            array(__DIR__ . "/examples/product.jdf"),
//            array(__DIR__ . "/examples/run_list.jdf"),
            array(__DIR__ . "/examples/spawned.jdf"),
//            array(__DIR__ . "/examples/stripping_processes.jdf"),
        );
    }
}
