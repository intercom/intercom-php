<?php

namespace Intercom\Types;

enum NewsItemRequestState: string
{
    case Draft = "draft";
    case Live = "live";
}
