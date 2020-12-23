<?php

namespace Arch\Domain\Person\Contracts;

use Arch\Domain\Person\Person;

interface PersonRepositoryInterface
{
    public function save(Person $person): Person;
    public function find(int $id): Person;
    public function all(): iterable;
    public function delete(int $id): void;
}
