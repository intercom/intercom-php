<?php

namespace Intercom\AiContent\Types;

enum UpdateContentImportSourceRequestStatus: string
{
    case Active = "active";
    case Deactivated = "deactivated";
}
