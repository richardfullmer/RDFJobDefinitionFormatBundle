<?php

namespace RDF\JobDefinitionFormatBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Doctrine\OXM\Types\Type;

class RDFJobDefinitionFormatBundle extends Bundle
{
    public function boot()
    {
        // todo, this probably isn't the best place to put this...
        Type::addType('jdfdatetime', "RDF\\JobDefinitionFormatBundle\\Types\\JDFDateTimeType");
    }
}
