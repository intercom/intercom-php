<?php

namespace Intercom\Unstable\AiContent\Types;

enum UpdateContentImportSourceRequestSyncBehavior: string
{
    case Api = "api";
    case Automated = "automated";
    case Manual = "manual";
}
