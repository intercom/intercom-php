<?php

namespace Intercom\Unstable\Macros\Types;

enum MacroAvailableOnItem: string
{
    case Inbox = "inbox";
    case Messenger = "messenger";
}
