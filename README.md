# RDFJobDefinitionFormatBundle

[![Build Status](https://secure.travis-ci.org/richardfullmer/RDFJobDefinitionFormatBundle.png)](http://travis-ci.org/richardfullmer/RDFJobDefinitionFormatBundle)

A Symfony2 Bundle for working with the [CIP4 Job Definition Format](http://www.cip4.org/documents/jdf_specifications/html2/JDF1.4a.htm) specification.

- not ready for production use (see `Status` below)

## Installation

RDFJobDefinitionFormatBundle uses the [oxm](https://github.com/doctrine/oxm) and [DoctrineOXMBundle](https://github.com/doctrine/DoctrineOXMBundle) projects from Doctrine.

### Step 1: Download the RDFJobDefintionFormatBundle

#### Using the vendors script

Add the following to your `deps` file:

    [RDFJobDefinitionFormatBundle]
        git=git://github.com/richardfullmer/RDFJobDefinitionFormatBundle.git
        target=/bundles/RDF/JobDefinitionFormatBundle

    [doctrine-oxm]
        git=http://github.com/doctrine/oxm.git
        target=/doctrine-oxm

    [DoctrineOXMBundle]
        git=http://github.com/doctrine/DoctrineOXMBundle.git
        target=/bundles/Doctrine/Bundle/OXMBundle

And run the vendors script:

    $ php bin/vendors install

#### Using composer

Add the following to your `composer.json` file:

    {
        "require": {
            "rdf/job-definition-format-bundle": "master-dev"
        }
    }

### Step 2: Configuring the autoloader

Add the `RDF` namespace to your autoloader:

    <?php
    // app/autoload.php

    $loader->registerNamespaces(array(
        // ...
        'RDF'                       => __DIR__.'/../vendor/bundles',
        'Doctrine\\OXM'             => __DIR__.'/../vendor/doctrine-oxm/lib',
        'Doctrine\\Bundle'          => __DIR__.'/../vendor/bundles',
    ));

And make sure you register the OXM Annotations:

    // app/autoload.php
    AnnotationRegistry::registerFile(__DIR__.'/../vendor/doctrine-oxm/lib/Doctrine/OXM/Mapping/Driver/DoctrineAnnotations.php');

### Step 3: Enable the bundle

Enable the bundle in the kernel:

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new RDF\JobDefinitionFormatBundle\RDFJobDefinitionFormatBundle(),
            new Doctrine\Bundle\OXMBundle\DoctrineOXMBundle(),
        );
    }

## Configuration

TODO

## Unit Tests

Unit tests can be run with `phpunit` and dependencies included with `composer.phar`:

    $ wget -nc http://getcomposer.org/composer.phar
    $ php composer.phar install
    $ phpunit --coverage-text

## Status

 * JDF specific data types (COMPLETE)
 * Metadata for serialization with doctrine-oxm (IN PROGRESS)
 * Validation of JDF Entities with Symfony2 Validation library (PLANNED)
 * Builders for easy construction and traversal of JDF objects (PLANNED)
 * ID <=> IDREF resolution lookup (PLANNED)
 * JDF device capability aware JDF Workflow (PLANNED)

## Author

Richard Fullmer <richardfullmer@gmail.com>

## License

RDFJobDefinitionFormatBundle is licensed under the MIT License. See the LICENSE file for full details.