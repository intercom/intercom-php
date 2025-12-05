<?php

namespace Intercom\Unstable\Types;

enum RegisterFinVoiceCallRequestSource: string
{
    case Five9 = "five9";
    case ZoomPhone = "zoom_phone";
    case AwsConnect = "aws_connect";
}
