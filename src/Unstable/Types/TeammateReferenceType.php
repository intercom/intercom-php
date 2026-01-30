<?php

namespace Intercom\Unstable\Types;

enum TeammateReferenceType: string
{
    case Admin = "admin";
    case Team = "team";
    case Bot = "bot";
}
