<?php

namespace Intercom\TicketTypes\Types;

enum UpdateTicketTypeRequestCategory: string
{
    case Customer = "Customer";
    case BackOffice = "Back-office";
    case Tracker = "Tracker";
}
