<?php

namespace Intercom\Types;

enum ArticleContentState: string
{
    case Published = "published";
    case Draft = "draft";
}
