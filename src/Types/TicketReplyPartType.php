<?php

namespace Intercom\Types;

enum TicketReplyPartType: string
{
    case Note = "note";
    case Comment = "comment";
    case QuickReply = "quick_reply";
}
