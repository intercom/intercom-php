<?php

namespace Intercom\TicketTypes\Types;

enum UpdateTicketTypeRequestBodyCategory: string
{
    case Customer = "Customer";
    case BackOffice = "Back-office";
    case Tracker = "Tracker";
}
