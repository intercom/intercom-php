<?php

namespace Intercom\AiContent\Types;

enum UpdateContentImportSourceRequestSyncBehavior: string
{
    case Api = "api";
    case Automated = "automated";
    case Manual = "manual";
}
