<?php

namespace Intercom\Unstable\Types;

enum WorkflowExportWorkflowState: string
{
    case Live = "live";
    case Draft = "draft";
    case Paused = "paused";
}
