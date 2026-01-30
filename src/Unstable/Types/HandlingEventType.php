<?php

namespace Intercom\Unstable\Types;

enum HandlingEventType: string
{
    case Paused = "paused";
    case Resumed = "resumed";
}
