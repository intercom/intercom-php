<?php

namespace Intercom\Unstable\AiContent\Types;

enum ContentImportSourceStatus: string
{
    case Active = "active";
    case Deactivated = "deactivated";
}
