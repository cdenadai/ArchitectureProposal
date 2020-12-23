<?php 

namespace Arch\Tests\Domain\Person;

use Arch\Tests\TestCase;
use Arch\Domain\Person\Email;

class EmailTest extends TestCase
{
    /** @test */
    public function should_fail_if_not_valid_email()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('test@');
    }

    /** @test */
    public function return_as_string_should_be_a_email_string_only()
    {
        $email = new Email('test@test.com');
        $this->assertSame((string) $email, 'test@test.com');
    }
}