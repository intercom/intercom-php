<?php

namespace Intercom\Articles\Types;

enum ArticleListItemState: string
{
    case Published = "published";
    case Draft = "draft";
}
