<?php

namespace Intercom\Unstable\Types;

enum CustomActionFinishedActionResult: string
{
    case Success = "success";
    case Failed = "failed";
}
