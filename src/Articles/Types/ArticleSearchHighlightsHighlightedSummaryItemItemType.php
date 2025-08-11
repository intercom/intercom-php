<?php

namespace Intercom\Articles\Types;

enum ArticleSearchHighlightsHighlightedSummaryItemItemType: string
{
    case Highlight = "highlight";
    case Plain = "plain";
}
