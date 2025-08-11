<?php

namespace Intercom\Types;

enum SingleSelectComponentSaveState: string
{
    case Unsaved = "unsaved";
    case Saved = "saved";
    case Failed = "failed";
}
