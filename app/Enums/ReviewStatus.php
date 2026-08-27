<?php

namespace App\Enums;

enum ReviewStatus: string
{
    case PENDING = 'pending';
    case PUBLISHED = 'published';
    case FLAGGED = 'flagged';
}