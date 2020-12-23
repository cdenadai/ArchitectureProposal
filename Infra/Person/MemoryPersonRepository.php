<?php

namespace Arch\Infra\Person;

use Arch\Domain\Person\Contracts\PersonRepositoryInterface;
use Arch\Domain\Person\Person;

class MemoryPersonRepository implements PersonRepositoryInterface
{
    private array $persons = [];

    public function save(Person $person): void
    {
        if($person->id() !== null) $this->update($person);
        else $this->create($person);
    }

    public function create(Person $person): void
    {
        $newid = count($this->persons);
        $person->setID($newid + 1);
        $this->persons[] = $person;
    }

    public function update(Person $person): void
    {
        $foundPerson = false;

        foreach ($this->persons as $key => $personOnDB) {
            if($personOnDB->id() === $person->id()) {
                $this->persons[$key] = $person;
                $foundPerson = true;
            }
        }

        if(!$foundPerson) throw new \Exception("Pessoa não encontrada");
    }

    public function find(int $id): Person
    {
        $person = array_filter(
            $this->persons,
            fn (Person $person) => $person->id() === $id
        );

        if (count($person) === 0) throw new \Exception('Pessoa não encontrada');

        if (count($person) > 1) throw new \Exception("Falha no banco de dados, mais de uma pessoa com o ID: $id");

        return $person[0];
    }

    public function all(): iterable
    {
        return $this->persons;
    }

    public function delete(int $id): void
    {
        $foundPerson = false;

        foreach ($this->persons as $key => $personOnDB) {
            if($personOnDB->id() === $id) {
                unset($this->persons[$key]);
                $foundPerson = true;
            }
        }

        if(!$foundPerson) throw new \Exception("Pessoa não encontrada");
    }
}
