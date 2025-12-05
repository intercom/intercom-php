<?php

namespace Intercom\AiAgent\Types;

enum AiAgentResolutionState: string
{
    case AssumedResolution = "assumed_resolution";
    case ConfirmedResolution = "confirmed_resolution";
    case RoutedToTeam = "routed_to_team";
    case Abandoned = "abandoned";
}
