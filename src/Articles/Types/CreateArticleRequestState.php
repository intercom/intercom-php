<?php

namespace Intercom\Articles\Types;

enum CreateArticleRequestState: string
{
    case Published = "published";
    case Draft = "draft";
}
