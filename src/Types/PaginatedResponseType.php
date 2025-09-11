<?php

namespace Intercom\Types;

enum PaginatedResponseType: string
{
    case List_ = "list";
    case ConversationList = "conversation.list";
}
