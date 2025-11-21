<?php

namespace Intercom\AiContent\Types;

enum CreateContentImportSourceRequestStatus: string
{
    case Active = "active";
    case Deactivated = "deactivated";
}
