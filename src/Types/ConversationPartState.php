<?php

namespace Intercom\Types;

enum ConversationPartState: string
{
    case Open = "open";
    case Closed = "closed";
    case Snoozed = "snoozed";
}
