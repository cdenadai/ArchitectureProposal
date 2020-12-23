<?php

namespace Arch\Infra\Person;

use Arch\Domain\Person\Person;
use Arch\Infra\Database\Faker;

class PersonFactory
{
    private $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    public function make(iterable|object $data = []): Person
    {
        $data = (object) $data;
        return Person::make(
            $data->id ?? null,
            $data->name ?? $this->faker->name,
            $data->email ?? $this->faker->email,
        );
    }
}
