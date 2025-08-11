<?php

namespace Intercom\Articles\Types;

enum CreateArticleRequestParentType: string
{
    case Collection = "collection";
    case Section = "section";
}
