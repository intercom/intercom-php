<?php

namespace Intercom\Types;

enum CreateArticleRequestState: string
{
    case Published = "published";
    case Draft = "draft";
}
