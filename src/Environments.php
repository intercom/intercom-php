<?php

namespace Intercom;

enum Environments: string
{
    case UsProduction = "https://api.intercom.io";
    case EuProduction = "https://api.eu.intercom.io";
    case AuProduction = "https://api.au.intercom.io";
}
