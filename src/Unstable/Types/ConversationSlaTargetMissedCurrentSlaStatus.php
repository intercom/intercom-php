<?php

namespace Intercom\Unstable\Types;

enum ConversationSlaTargetMissedCurrentSlaStatus: string
{
    case Hit = "hit";
    case Missed = "missed";
    case Active = "active";
    case Paused = "paused";
    case Canceled = "canceled";
}
