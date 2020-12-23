<?php

namespace Arch\Infra\Database;

use Faker\Factory;

class Faker
{
    public static function create()
    {
        return Factory::create();
    }
}
