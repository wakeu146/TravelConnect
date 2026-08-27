<?php

namespace App\Enums;

enum DocumentType: string
{
    case LICENSE = 'license';
    case ID_PROOF = 'id_proof';
    case BUSINESS_REGISTRATION = 'business_registration';
    case OTHER = 'other';
}