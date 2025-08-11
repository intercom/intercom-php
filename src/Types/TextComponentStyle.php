<?php

namespace Intercom\Types;

enum TextComponentStyle: string
{
    case Header = "header";
    case Paragraph = "paragraph";
    case Muted = "muted";
    case Error = "error";
}
