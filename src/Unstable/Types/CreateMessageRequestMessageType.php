<?php

namespace Intercom\Unstable\Types;

enum CreateMessageRequestMessageType: string
{
    case InApp = "in_app";
    case Email = "email";
    case Sms = "sms";
    case Whatsapp = "whatsapp";
}
