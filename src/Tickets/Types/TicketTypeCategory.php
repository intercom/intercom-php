<?php

namespace Intercom\Tickets\Types;

enum TicketTypeCategory: string
{
    case Customer = "Customer";
    case BackOffice = "Back-office";
    case Tracker = "Tracker";
}
