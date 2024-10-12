<?php

namespace App\Enums;

use Jiannei\Enum\Laravel\Support\Traits\EnumEnhance;

enum ResponseEnum: int
{
    use EnumEnhance;

    case SERVICE_REGISTER_SUCCESS = 200101;
    case SERVICE_LOGIN_SUCCESS = 200102;

    case SERVICE_REGISTER_ERROR = 500101;
    case SERVICE_LOGIN_ERROR = 500102;

    case CLIENT_PARAMETER_ERROR = 400001;
    case CLIENT_CREATED_ERROR = 400002;
    case CLIENT_DELETED_ERROR = 400003;

    case SYSTEM_ERROR = 500001;
    case SYSTEM_UNAVAILABLE = 500002;
    case SYSTEM_CACHE_CONFIG_ERROR = 500003;
    case SYSTEM_CACHE_MISSED_ERROR = 500004;
    case SYSTEM_CONFIG_ERROR = 500005;
}
