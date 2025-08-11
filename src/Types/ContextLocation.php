<?php

namespace Intercom\Types;

enum ContextLocation: string
{
    case Conversation = "conversation";
    case Home = "home";
    case Message = "message";
    case Operator = "operator";
}
