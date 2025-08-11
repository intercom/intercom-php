<?php

namespace Intercom\Unstable\Types;

enum AssignConversationRequestType: string
{
    case Admin = "admin";
    case Team = "team";
}
