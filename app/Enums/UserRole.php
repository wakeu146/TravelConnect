<?php

namespace App\Enums;

enum UserRole: string
{
    case TRAVELER = 'traveler';
    case AGENCY_OWNER = 'agency_owner';
    case ADMIN = 'admin';
}