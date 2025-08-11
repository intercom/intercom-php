<?php

namespace Intercom\Unstable\AiContent\Types;

enum CreateContentImportSourceRequestStatus: string
{
    case Active = "active";
    case Deactivated = "deactivated";
}
