<?php

namespace Intercom\Tickets\Types;

enum TicketPartTicketState: string
{
    case Submitted = "submitted";
    case InProgress = "in_progress";
    case WaitingOnCustomer = "waiting_on_customer";
    case Resolved = "resolved";
}
