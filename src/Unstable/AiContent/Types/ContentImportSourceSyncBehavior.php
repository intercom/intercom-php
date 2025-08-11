<?php

namespace Intercom\Unstable\AiContent\Types;

enum ContentImportSourceSyncBehavior: string
{
    case Api = "api";
    case Automatic = "automatic";
    case Manual = "manual";
}
