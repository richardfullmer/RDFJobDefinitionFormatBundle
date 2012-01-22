<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests\Model;


use Doctrine\OXM\Configuration;
use Doctrine\Bundle\OXMBundle\Mapping\Driver\XmlDriver;
use Doctrine\OXM\Mapping\ClassMetadataFactory;
use Doctrine\OXM\Marshaller\XmlMarshaller;

/**
 *
 *
 * @author Richard Fullmer <richardfullmer@gmail.com>
 */
class MarshallerTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Doctrine\OXM\Marshaller\XmlMarshaller
     */
    private static $marshaller;

    /**
     * @return \Doctrine\OXM\Marshaller\XmlMarshaller
     */
    protected static function getMarshaller()
    {
        if (!self::$marshaller) {
            $config = new Configuration();
            $driver = new XmlDriver(__DIR__."/../../Resources/config/doctrine");
            $driver->setNamespacePrefixes(array(
                __DIR__."/../../Resources/config/doctrine" => "RDF\\JobDefinitionFormatBundle\\Model"
            ));
//            print_r($driver->getAllClassNames()); die();
            $config->setMetadataDriverImpl($driver);
            $config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache());

            $metadataFactory = new ClassMetadataFactory($config);

            self::$marshaller = new XmlMarshaller($metadataFactory);
        }

        return self::$marshaller;
    }
}
