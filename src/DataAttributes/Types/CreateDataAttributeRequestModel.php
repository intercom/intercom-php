<?php

namespace Intercom\DataAttributes\Types;

enum CreateDataAttributeRequestModel: string
{
    case Contact = "contact";
    case Company = "company";
}
