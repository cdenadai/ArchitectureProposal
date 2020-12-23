<?php

namespace Arch\Tests\Domain\Helpers;

use Arch\Tests\TestCase;

class OnlyNumbersTest extends TestCase
{
    /** @test */
    public function function_only_numbers_should_exists_globally()
    {
        $valueToProcess = 'abc123@_.-4/'; 
        $numbers = onlyNumbers($valueToProcess);
        $this->assertSame($numbers, '1234'); 
    }
}
