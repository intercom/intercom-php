<?php

namespace Intercom\Unstable\DataExport\Types;

enum DataExportStatus: string
{
    case Pending = "pending";
    case InProgress = "in_progress";
    case Failed = "failed";
    case Completed = "completed";
    case NoData = "no_data";
    case Canceled = "canceled";
}
