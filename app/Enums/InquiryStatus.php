<?php

namespace App\Enums;

enum InquiryStatus: string
{
    case OPEN = 'open';
    case RESPONDED = 'responded';
    case CLOSED = 'closed';
}