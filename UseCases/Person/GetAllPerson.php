<?php

namespace Arch\UseCases\Person;

use Arch\Domain\Person\Contracts\PersonRepositoryInterface;

class GetAllPerson
{
    private PersonRepositoryInterface $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function execute(): iterable
    {
        return $this->personRepository->all();
    }
}
