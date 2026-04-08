<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    use UsesUuid;
}
