<?php
require 'vendor/autoload.php';

use Arch\Infra\Person\MemoryPersonRepository;
use Arch\UseCases\Person\GetAllPerson;

$personRepository = new MemoryPersonRepository();
$savePersonUseCase = new GetAllPerson($personRepository);

$createdPerson = $savePersonUseCase->execute();

var_dump($createdPerson);