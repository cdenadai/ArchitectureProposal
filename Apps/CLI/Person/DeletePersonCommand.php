<?php
require 'vendor/autoload.php';

use Arch\UseCases\Person\DeletePerson;
use Arch\Infra\Person\MemoryPersonRepository;

$personRepository = new MemoryPersonRepository();
$savePersonUseCase = new DeletePerson($personRepository);

$createdPerson = $savePersonUseCase->execute(1);

var_dump($createdPerson);