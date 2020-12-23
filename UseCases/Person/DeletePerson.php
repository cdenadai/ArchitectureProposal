<?php

namespace Arch\UseCases\Person;

use Arch\Domain\Person\Person;
use Arch\Domain\Person\Contracts\PersonRepositoryInterface;

class DeletePerson
{
    private PersonRepositoryInterface $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function execute(int $id): Person
    {
        return $this->personRepository->delete($id);
    }
}
