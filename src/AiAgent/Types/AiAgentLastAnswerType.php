<?php

namespace Intercom\AiAgent\Types;

enum AiAgentLastAnswerType: string
{
    case AiAnswer = "ai_answer";
    case CustomAnswer = "custom_answer";
}
