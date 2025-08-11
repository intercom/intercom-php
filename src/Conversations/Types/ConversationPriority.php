<?php

namespace Intercom\Conversations\Types;

enum ConversationPriority: string
{
    case Priority = "priority";
    case NotPriority = "not_priority";
}
