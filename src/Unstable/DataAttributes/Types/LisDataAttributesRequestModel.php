<?php

namespace Intercom\Unstable\DataAttributes\Types;

enum LisDataAttributesRequestModel: string
{
    case Contact = "contact";
    case Company = "company";
    case Conversation = "conversation";
}
