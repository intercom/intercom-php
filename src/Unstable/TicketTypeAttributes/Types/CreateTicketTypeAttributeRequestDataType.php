<?php

namespace Intercom\Unstable\TicketTypeAttributes\Types;

enum CreateTicketTypeAttributeRequestDataType: string
{
    case String = "string";
    case List_ = "list";
    case Integer = "integer";
    case Decimal = "decimal";
    case Boolean = "boolean";
    case Datetime = "datetime";
    case Files = "files";
}
