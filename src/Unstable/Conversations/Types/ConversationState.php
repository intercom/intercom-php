<?php

namespace Intercom\Unstable\Conversations\Types;

enum ConversationState: string
{
    case Open = "open";
    case Closed = "closed";
    case Snoozed = "snoozed";
}
