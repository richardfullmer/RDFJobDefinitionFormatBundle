<?php

/*
 * This file is part of the RDFJobDefinitionFormatBundle package.
 *
 * (c) Richard Fullmer <http://github.com/richardfullmer>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (file_exists($file = __DIR__.'/../vendor/.composer/autoload.php')) {
    $autoload = require_once $file;
} else {
    throw new RuntimeException('Install dependencies to run test suite.');
}

use Doctrine\Common\Annotations\AnnotationRegistry;

AnnotationRegistry::registerLoader(function($class) use ($autoload) {
    $autoload->loadClass($class);
    return class_exists($class, false);
});
AnnotationRegistry::registerFile(__DIR__.'/../vendor/doctrine/oxm/lib/Doctrine/OXM/Mapping/Driver/DoctrineAnnotations.php');


spl_autoload_register(function($class) {
    if (0 === strpos($class, 'RDF\\JobDefinitionFormatBundle\\')) {
        $path = __DIR__.'/../'.implode('/', array_slice(explode('\\', $class), 2)).'.php';
        if (!stream_resolve_include_path($path)) {
            return false;
        }
        require_once $path;
        return true;
    }
});

// load types for test
\Doctrine\OXM\Types\Type::addType('jdfdatetime', "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\JDFDateTimeType");
\Doctrine\OXM\Types\Type::addType('cmykcolor', "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\CMYKColorType");
