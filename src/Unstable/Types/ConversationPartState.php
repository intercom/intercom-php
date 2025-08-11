<?php

namespace Intercom\Unstable\Types;

enum ConversationPartState: string
{
    case Open = "open";
    case Closed = "closed";
    case Snoozed = "snoozed";
}
