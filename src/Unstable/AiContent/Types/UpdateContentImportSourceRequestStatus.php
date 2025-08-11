<?php

namespace Intercom\Unstable\AiContent\Types;

enum UpdateContentImportSourceRequestStatus: string
{
    case Active = "active";
    case Deactivated = "deactivated";
}
