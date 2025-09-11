<?php

namespace Intercom\Unstable\Types;

enum CreateTicketTypeRequestCategory: string
{
    case Customer = "Customer";
    case BackOffice = "Back-office";
    case Tracker = "Tracker";
}
