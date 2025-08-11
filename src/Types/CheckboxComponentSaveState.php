<?php

namespace Intercom\Types;

enum CheckboxComponentSaveState: string
{
    case Unsaved = "unsaved";
    case Saved = "saved";
    case Failed = "failed";
}
