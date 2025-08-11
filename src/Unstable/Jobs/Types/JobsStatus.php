<?php

namespace Intercom\Unstable\Jobs\Types;

enum JobsStatus: string
{
    case Pending = "pending";
    case Success = "success";
    case Failed = "failed";
}
