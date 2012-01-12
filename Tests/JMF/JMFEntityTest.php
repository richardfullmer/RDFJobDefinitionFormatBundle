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

namespace RDF\JobDefinitionFormatBundle\Tests\JMF;

use RDF\JobDefinitionFormatBundle\Tests\MarshallerTestCase;
 
class JMFEntityTest extends MarshallerTestCase
{
    /**
     * @dataProvider exampleProvider
     */
    public function testMarshalling($source)
    {
        $source = realpath($source);
        $marshaller = self::getMarshaller();

        $jmf = $marshaller->unmarshalFromStream("file://".$source);

        $this->assertNotNull($jmf);

        $unmarshalled = $marshaller->marshalToString($jmf);

        $this->assertNotEmpty($unmarshalled);
    }

    public function exampleProvider()
    {
        return array(
            array(__DIR__ . "/examples/known_messages_query.jmf"),
            array(__DIR__ . "/examples/known_messages_response.jmf"),
            array(__DIR__ . "/examples/status_query.jmf"),
            array(__DIR__ . "/examples/status_response.jmf"),
            array(__DIR__ . "/examples/status_signal_1.jmf"),
            array(__DIR__ . "/examples/status_signal_2.jmf"),
            array(__DIR__ . "/examples/status_signal_3.jmf"),
        );
    }
}
