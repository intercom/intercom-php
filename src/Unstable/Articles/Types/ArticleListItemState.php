<?php

namespace Intercom\Unstable\Articles\Types;

enum ArticleListItemState: string
{
    case Published = "published";
    case Draft = "draft";
}
