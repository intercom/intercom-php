<?php

namespace Intercom\Unstable\SubscriptionTypes\Types;

enum SubscriptionTypeConsentType: string
{
    case OptOut = "opt_out";
    case OptIn = "opt_in";
}
