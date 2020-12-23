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

    public function make(array $data = [])
    {
        return Person::makeByValues(
            $data['id'] ?? null,
            $data['name'] ?? $this->faker->name,
            $data['email'] ?? $this->faker->email,
        );
    }
}
