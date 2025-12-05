<?php

namespace Intercom\Unstable\Types;

enum CreateDataAttributeRequestOneDataType: string
{
    case String = "string";
    case Integer = "integer";
    case Float = "float";
    case Boolean = "boolean";
    case Datetime = "datetime";
    case Date = "date";
}
