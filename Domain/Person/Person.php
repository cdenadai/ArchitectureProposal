<?php

namespace Arch\Domain\Person;

use Arch\Domain\Person\Email;

class Person
{
    private ?int $id;
    public string $name;
    private Email $email;

    public static function make(?int $id = null, string $name, string $email): Person
    {
        return new Person($id, $name, new Email($email));
    }

    public static function makeFromIterable(iterable|object $data): Person
    {
        $data = (object) $data;
        return Person::make($data->id, $data->name, new Email($data->email));
    }

    public function __construct(?int $id = null,string $name, Email $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = new Email($email);
        return $this;
    }

    public function setID(int $id): void
    {
        $this->id = $id;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function email(): string
    {
        return $this->email;
    }
}
