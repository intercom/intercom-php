<?php

namespace Intercom\Types;

enum CustomActionFinishedActionResult: string
{
    case Success = "success";
    case Failed = "failed";
}
