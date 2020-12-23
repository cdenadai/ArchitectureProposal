<?php

namespace Arch\UseCases\Person;

use Arch\Domain\Person\Person;
use Arch\Domain\Person\Contracts\PersonRepositoryInterface;

class SavePerson
{
    private PersonRepositoryInterface $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function execute(iterable|object $personData): Person
    {
        $personData = (object) $personData;
        $person = Person::make($personData->id, $personData->name, $personData->email);
        return $this->personRepository->save($person);
    }
}
