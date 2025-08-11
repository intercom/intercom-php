<?php

namespace Intercom\Types;

enum SlaAppliedSlaStatus: string
{
    case Hit = "hit";
    case Missed = "missed";
    case Cancelled = "cancelled";
    case Active = "active";
}
