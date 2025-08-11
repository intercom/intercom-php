<?php

namespace Intercom\Unstable\Types;

enum MultipleFilterSearchRequestOperator: string
{
    case And_ = "AND";
    case Or_ = "OR";
}
