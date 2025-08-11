<?php

namespace Intercom\Tickets\Types;

enum TicketCategory: string
{
    case Customer = "Customer";
    case BackOffice = "Back-office";
    case Tracker = "Tracker";
}
