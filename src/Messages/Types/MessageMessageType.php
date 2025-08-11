<?php

namespace Intercom\Messages\Types;

enum MessageMessageType: string
{
    case Email = "email";
    case Inapp = "inapp";
    case Facebook = "facebook";
    case Twitter = "twitter";
}
