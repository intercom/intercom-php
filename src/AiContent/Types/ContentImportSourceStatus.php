<?php

namespace Intercom\AiContent\Types;

enum ContentImportSourceStatus: string
{
    case Active = "active";
    case Deactivated = "deactivated";
}
