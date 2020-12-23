<?php

namespace Arch\Domain\Person;

use Arch\Domain\Person\Email;

class Person
{
    private ?int $id;
    public string $name;
    private Email $email;

    public static function makeByValues(?int $id = null, string $name, string $email)
    {
        return new Person($id, $name, new Email($email));
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
