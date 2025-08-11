<?php

namespace Intercom\Unstable\DataAttributes\Types;

enum DataAttributeDataType: string
{
    case String = "string";
    case Integer = "integer";
    case Float = "float";
    case Boolean = "boolean";
    case Date = "date";
}
