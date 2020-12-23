<?php

namespace Arch\Domain\Person;

class Email
{
    private string $mailAddress;

    public function __construct(string $mailAddress)
    {
        if (filter_var($mailAddress, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException(
                'Formato do Endereço de e-mail inválido'
            );
        }

        $this->mailAddress = $mailAddress;
    }

    public function __toString(): string
    {
        return $this->mailAddress;
    }
}