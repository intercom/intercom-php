<?php

namespace Intercom\News\Types;

enum NewsItemState: string
{
    case Draft = "draft";
    case Live = "live";
}
