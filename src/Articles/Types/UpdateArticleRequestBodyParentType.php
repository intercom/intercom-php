<?php

namespace Intercom\Articles\Types;

enum UpdateArticleRequestBodyParentType: string
{
    case Collection = "collection";
    case Section = "section";
}
