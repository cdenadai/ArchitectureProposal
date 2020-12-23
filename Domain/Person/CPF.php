<?php

namespace Arch\Domain\Person;

class CPF
{
    private string $documentNumber;

    public function __construct(string $documentNumber)
    {
        $this->setDocumentNumber($documentNumber);
    }

    private function setDocumentNumber(string $documentNumber): void
    {
        $this->validateFormat($documentNumber);
        $numbers = onlyNumbers($documentNumber);
        $this->validateCalculus($numbers);
        $this->documentNumber = $numbers;
    }

    private function validateFormat(string $documentNumber): void
    {
        $options = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        if (filter_var($documentNumber, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new \InvalidArgumentException('Formato de CPF inválido');
        }
    }

    private function validateCalculus(string $documentNumber): void
    {
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $documentNumber[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($documentNumber[$c] != $d) {
                throw new \InvalidArgumentException('Falha no cálculo do CPF. Possível CPF falso.');
            }
        }
    }

    public function __toString(): string
    {
        return $this->documentNumber;
    }
}