<?php

namespace RDF\JobDefinitionFormatBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Doctrine\OXM\Types\Type;

class RDFJobDefinitionFormatBundle extends Bundle
{
    public function boot()
    {
        // todo, is this the best place for this?
        self::registerOXMTypes();
    }

    public static function registerOXMTypes()
    {
        $types = array(
            'JDF.Boolean' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\BooleanType",
            'JDF.CMYKColor' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\CMYKColorType",
            'JDF.Date' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\DateType",
            'JDF.DateTime' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\DateTimeType",
            'JDF.DateTimeRange' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\DateTimeRangeType",
            'JDF.DateTimeRangeList' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\DateTimeRangeListType",
            'JDF.Double' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\DoubleType",
            'JDF.DoubleList' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\DoubleListType",
            'JDF.DoubleRange' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\DoubleRangeType",
            'JDF.Duration' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\DurationType",
            'JDF.DurationRange' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\DurationRangeType",
            'JDF.gYearMonth' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\gYearMonthType",
            'JDF.HexBinary' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\HexBinaryType",
            'JDF.ID' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\IDType",
            'JDF.IDREF' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\IDREFType",
            'JDF.IDREFS' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\IDREFSType",
            'JDF.Integer' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\IntegerType",
            'JDF.IntegerList' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\IntegerListType",
            'JDF.IntegerRange' => "RDF\\JobDefinitionFormatBundle\\Doctrine\\OXM\\Types\\IntegerRangeType",
        );

        foreach ($types as $name => $class) {
            Type::addType($name, $class);
        }
    }
}
