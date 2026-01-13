<?php

namespace Intercom\Unstable\Types;

enum ConversationSlaPausedCurrentSlaStatus: string
{
    case Active = "active";
    case Hit = "hit";
    case Missed = "missed";
    case Canceled = "canceled";
}
