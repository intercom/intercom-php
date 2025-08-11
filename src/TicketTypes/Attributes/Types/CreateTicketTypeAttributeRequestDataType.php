<?php

namespace Intercom\TicketTypes\Attributes\Types;

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
