<?php

namespace Intercom\Types;

enum InputComponentSaveState: string
{
    case Unsaved = "unsaved";
    case Saved = "saved";
    case Failed = "failed";
}
