<?php

namespace Intercom\Unstable\News\Types;

enum NewsItemState: string
{
    case Draft = "draft";
    case Live = "live";
}
