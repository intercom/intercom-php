<?php

namespace Intercom\Unstable\Types;

enum UpdateTicketTypeRequestCategory: string
{
    case Customer = "Customer";
    case BackOffice = "Back-office";
    case Tracker = "Tracker";
}
