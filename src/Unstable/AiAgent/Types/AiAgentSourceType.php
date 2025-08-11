<?php

namespace Intercom\Unstable\AiAgent\Types;

enum AiAgentSourceType: string
{
    case EssentialsPlanSetup = "essentials_plan_setup";
    case Profile = "profile";
    case Workflow = "workflow";
    case WorkflowPreview = "workflow_preview";
    case FinPreview = "fin_preview";
}
