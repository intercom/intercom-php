<?php

namespace Intercom\Types;

enum AdminReplyConversationRequestMessageType: string
{
    case Comment = "comment";
    case Note = "note";
}
