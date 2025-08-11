<?php

namespace Intercom\Types;

enum CreateMessageRequestType: string
{
    case User = "user";
    case Lead = "lead";
}
