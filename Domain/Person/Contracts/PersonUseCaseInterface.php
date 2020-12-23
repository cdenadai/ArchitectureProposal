<?php

namespace Arch\Domain\Person\Contracts;

interface PersonUseCaseInterface
{
    public function execute(iterable|object $personData): Person;
}
