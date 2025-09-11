<?php

namespace Intercom\Unstable\Types;

enum CreateArticleRequestState: string
{
    case Published = "published";
    case Draft = "draft";
}
