<?php

namespace Intercom\Unstable\Types;

enum TicketPartAuthorType: string
{
    case Admin = "admin";
    case Bot = "bot";
    case Team = "team";
    case User = "user";
}
