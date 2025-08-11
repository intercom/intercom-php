<?php

namespace Intercom\Unstable\Types;

enum UpdateArticleRequestState: string
{
    case Published = "published";
    case Draft = "draft";
}
