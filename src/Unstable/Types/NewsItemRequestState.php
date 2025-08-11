<?php

namespace Intercom\Unstable\Types;

enum NewsItemRequestState: string
{
    case Draft = "draft";
    case Live = "live";
}
