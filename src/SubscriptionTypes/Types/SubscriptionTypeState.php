<?php

namespace Intercom\SubscriptionTypes\Types;

enum SubscriptionTypeState: string
{
    case Live = "live";
    case Draft = "draft";
    case Archived = "archived";
}
