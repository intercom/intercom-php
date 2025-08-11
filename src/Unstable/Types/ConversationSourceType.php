<?php

namespace Intercom\Unstable\Types;

enum ConversationSourceType: string
{
    case Conversation = "conversation";
    case Email = "email";
    case Facebook = "facebook";
    case Instagram = "instagram";
    case PhoneCall = "phone_call";
    case PhoneSwitch = "phone_switch";
    case Push = "push";
    case Sms = "sms";
    case Twitter = "twitter";
    case Whatsapp = "whatsapp";
}
