<?php
require 'vendor/autoload.php';

use Arch\Infra\Person\MemoryPersonRepository;
use Arch\UseCases\Person\SavePerson;

$personData = [
    'id' => null,
    'name' => $argv[1],
    'email' => $argv[2]
];

$personRepository = new MemoryPersonRepository();
$savePersonUseCase = new SavePerson($personRepository);

$createdPerson = $savePersonUseCase->execute($personData);

var_dump($createdPerson);