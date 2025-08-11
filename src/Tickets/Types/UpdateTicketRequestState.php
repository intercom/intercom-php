<?php

namespace Intercom\Tickets\Types;

enum UpdateTicketRequestState: string
{
    case InProgress = "in_progress";
    case WaitingOnCustomer = "waiting_on_customer";
    case Resolved = "resolved";
}
