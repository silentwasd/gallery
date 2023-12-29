<?php

namespace App\Enums;

enum PersonState: string
{
    case Waiting  = 'waiting';
    case Accepted = 'accepted';
    case Rejected = 'rejected';
}
