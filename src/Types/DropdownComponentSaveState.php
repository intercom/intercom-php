<?php

namespace Intercom\Types;

enum DropdownComponentSaveState: string
{
    case Unsaved = "unsaved";
    case Saved = "saved";
    case Failed = "failed";
}
