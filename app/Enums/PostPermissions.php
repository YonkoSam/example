<?php

namespace App\Enums;

enum PostPermissions: int
{
case create = 16;
case edit = 32;
case delete = 64;

}
