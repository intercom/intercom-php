<?php

namespace Intercom\Unstable\Types;

enum ConversationSlaTargetMissedSlaTargetType: string
{
    case FirstReplyTime = "first_reply_time";
    case NextReplyTime = "next_reply_time";
    case ResolutionTime = "resolution_time";
    case TimeToClose = "time_to_close";
}
