<?php

namespace Intercom\Types;

enum LinkedObjectCategory: string
{
    case Customer = "Customer";
    case BackOffice = "Back-office";
    case Tracker = "Tracker";
}
