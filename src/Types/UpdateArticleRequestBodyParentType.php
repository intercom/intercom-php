<?php

namespace Intercom\Types;

enum UpdateArticleRequestBodyParentType: string
{
    case Collection = "collection";
    case Section = "section";
}
