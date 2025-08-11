<?php

namespace Intercom\Types;

enum LinkedObjectType: string
{
    case Ticket = "ticket";
    case Conversation = "conversation";
}
