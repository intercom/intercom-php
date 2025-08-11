<?php

namespace Intercom\Unstable\SubscriptionTypes\Types;

enum SubscriptionTypeContentTypesItem: string
{
    case Email = "email";
    case SmsMessage = "sms_message";
}
