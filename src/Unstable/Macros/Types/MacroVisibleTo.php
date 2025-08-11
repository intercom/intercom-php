<?php

namespace Intercom\Unstable\Macros\Types;

enum MacroVisibleTo: string
{
    case Everyone = "everyone";
    case SpecificTeams = "specific_teams";
}
