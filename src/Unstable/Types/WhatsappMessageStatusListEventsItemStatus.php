<?php

namespace Intercom\Unstable\Types;

enum WhatsappMessageStatusListEventsItemStatus: string
{
    case Sent = "sent";
    case Delivered = "delivered";
    case Read = "read";
    case Failed = "failed";
}
