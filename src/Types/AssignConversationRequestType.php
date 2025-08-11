<?php

namespace Intercom\Types;

enum AssignConversationRequestType: string
{
    case Admin = "admin";
    case Team = "team";
}
