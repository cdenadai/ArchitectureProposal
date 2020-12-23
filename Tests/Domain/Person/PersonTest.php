<?php

namespace Arch\Tests\Domain\Person;

use Arch\Tests\TestCase;
use Arch\Domain\Person\Person;

class PersonTest extends TestCase
{
    /** @test */
    public function should_have_name()
    {
        $this->expectException(\TypeError::class);
        Person::make(null, null, 'test@test.com');
    }

    /** @test */
    public function should_have_email()
    {
        $this->expectException(\TypeError::class);
        Person::make(null, 'test', null);
    }

    /** @test */
    public function should_make_by_array()
    {
        $arrayData = [
            'id' => 2,
            'name' => 'Teste',
            'email' => 'test@test.com'
        ];

        $person = Person::makeFromIterable($arrayData);
        $this->assertSame($person->id(), $arrayData['id']);
        $this->assertSame($person->name(), $arrayData['name']);
        $this->assertSame($person->email(), $arrayData['email']);
    }

    /** @test */
    public function should_make_by_object()
    {
        $objectData = new \stdClass();
        $objectData->id = 2;
        $objectData->name = 'Teste';
        $objectData->email = 'test@test.com';

        $person = Person::makeFromIterable($objectData);
        $this->assertSame($person->id(), $objectData->id);
        $this->assertSame($person->name(), $objectData->name);
        $this->assertSame($person->email(), $objectData->email);
    }
}
