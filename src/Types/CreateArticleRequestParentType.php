<?php

namespace Intercom\Types;

enum CreateArticleRequestParentType: string
{
    case Collection = "collection";
    case Section = "section";
}
