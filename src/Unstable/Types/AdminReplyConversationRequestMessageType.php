<?php

namespace Intercom\Unstable\Types;

enum AdminReplyConversationRequestMessageType: string
{
    case Comment = "comment";
    case Note = "note";
    case QuickReply = "quick_reply";
}
