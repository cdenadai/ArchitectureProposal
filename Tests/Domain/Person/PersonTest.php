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
        Person::makeByValues(null, null, 'test@test.com');
    }

    /** @test */
    public function should_have_email()
    {
        $this->expectException(\TypeError::class);
        Person::makeByValues(null, 'test', null);
    }
}
