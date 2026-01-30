<?php

namespace Intercom\Unstable\Types;

enum ConversationSlaTargetMissedSlaStatesValueStatus: string
{
    case Hit = "hit";
    case Missed = "missed";
    case Active = "active";
    case Paused = "paused";
}
