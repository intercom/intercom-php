<?php

namespace Intercom\Types;

enum AdminReplyTicketRequestMessageType: string
{
    case Comment = "comment";
    case Note = "note";
    case QuickReply = "quick_reply";
}
