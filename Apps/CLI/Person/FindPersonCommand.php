<?php
require 'vendor/autoload.php';

use Arch\UseCases\Person\FindPerson;
use Arch\Infra\Person\MemoryPersonRepository;

$personRepository = new MemoryPersonRepository();
$savePersonUseCase = new FindPerson($personRepository);

$createdPerson = $savePersonUseCase->execute(1);

var_dump($createdPerson);