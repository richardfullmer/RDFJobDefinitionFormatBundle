<?php

/*
 * 
 */

namespace RDF\JobDefinitionFormatBundle\Tests;


use Doctrine\OXM\Configuration;
use Doctrine\OXM\Mapping\Driver\AnnotationDriver;
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
            $config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__."/../XmlEntity"));
            $config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache());

            $metadataFactory = new ClassMetadataFactory($config);

            self::$marshaller = new XmlMarshaller($metadataFactory);
        }

        return self::$marshaller;
    }
}
