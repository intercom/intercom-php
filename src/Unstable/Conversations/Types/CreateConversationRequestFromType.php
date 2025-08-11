<?php

namespace Intercom\Unstable\Conversations\Types;

enum CreateConversationRequestFromType: string
{
    case Lead = "lead";
    case User = "user";
    case Contact = "contact";
}
