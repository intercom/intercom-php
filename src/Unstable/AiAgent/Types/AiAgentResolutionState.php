<?php

namespace Intercom\Unstable\AiAgent\Types;

enum AiAgentResolutionState: string
{
    case AssumedResolution = "assumed_resolution";
    case ConfirmedResolution = "confirmed_resolution";
    case Escalated = "escalated";
    case NegativeFeedback = "negative_feedback";
}
