<?php

namespace Intercom\Articles\Types;

enum UpdateArticleRequestBodyState: string
{
    case Published = "published";
    case Draft = "draft";
}
