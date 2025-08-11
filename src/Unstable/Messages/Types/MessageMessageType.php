<?php

namespace Intercom\Unstable\Messages\Types;

enum MessageMessageType: string
{
    case Email = "email";
    case Inapp = "inapp";
    case Facebook = "facebook";
    case Twitter = "twitter";
    case Sms = "sms";
    case Whatsapp = "whatsapp";
}
