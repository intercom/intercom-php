<?php

namespace Intercom\Unstable\Tickets\Types;

enum TicketStateCategory: string
{
    case Submitted = "submitted";
    case InProgress = "in_progress";
    case WaitingOnCustomer = "waiting_on_customer";
    case Resolved = "resolved";
}
