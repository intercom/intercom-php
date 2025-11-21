<?php

namespace Intercom\Articles\Types;

enum UpdateArticleRequestState: string
{
    case Published = "published";
    case Draft = "draft";
}
