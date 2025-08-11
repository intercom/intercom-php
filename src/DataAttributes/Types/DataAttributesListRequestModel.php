<?php

namespace Intercom\DataAttributes\Types;

enum DataAttributesListRequestModel: string
{
    case Contact = "contact";
    case Company = "company";
    case Conversation = "conversation";
}
