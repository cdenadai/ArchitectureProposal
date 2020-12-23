<?php

namespace Arch\Tests\Infra\Person;

use Arch\Tests\TestCase;
use Arch\Domain\Person\Person;
use Arch\Infra\Person\PersonFactory;
use Arch\Infra\Person\MemoryPersonRepository;

class MemoryPersonRepositoryTest extends TestCase
{
    private $memoryRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->memoryRepository = new MemoryPersonRepository();
    }

    public function makeFakePerson(array $data = []): Person
    {
        $factory = new PersonFactory();
        return $factory->make($data);
    }

    /** @test */
    public function table_persons_should_init_empty()
    {
        $persons = $this->memoryRepository->all();
        $this->assertCount(0, $persons);
    }

    /** @test */
    public function should_insert_if_call_save_and_dont_have_id()
    {
        $person = $this->makeFakePerson();
        $createdPerson = $this->memoryRepository->save($person);
    
        $this->assertSame($person->name(), $createdPerson->name());
        $this->assertSame($person->email(), $createdPerson->email());
    }

    /** @test */
    public function should_update_if_call_save_and_have_id()
    {
        $person = $this->makeFakePerson();
        $createdPerson = $this->memoryRepository->save($person);
        
        $createdPerson->setName('Test');
        $updatedPerson = $this->memoryRepository->save($person);

        $this->assertSame('Test', $updatedPerson->name());
        $this->assertSame($person->email(), $updatedPerson->email());
    }

    /** @test */
    public function update_should_fail_if_call_save_have_id_and_dont_exists()
    {
        $this->expectException(\Exception::class);
        $person = $this->makeFakePerson([ 'id' => 2 ]);
        $this->memoryRepository->save($person);
    }


    /** @test */
    public function should_find_if_exists_on_db()
    {
        $person = $this->makeFakePerson();
        $createdPerson = $this->memoryRepository->save($person);
        
        $this->assertSame($person->name(), $createdPerson->name());
        $this->assertSame($person->email(), $createdPerson->email());
    }

    /** @test */
    public function should_find_should_fail_if_dont_exists_on_db()
    {
        $this->expectException(\Exception::class);
        $this->memoryRepository->find(1);
    }


    /** @test */
    public function delete_should_fails_if_dont_exists_on_db()
    {
        $this->expectException(\Exception::class);
        $this->memoryRepository->delete(1);
    }

    /** @test */
    public function should_delete_if_exists_on_db()
    {
        $person = $this->makeFakePerson();
        $this->memoryRepository->save($person);
        $this->memoryRepository->delete(1);

        $this->expectException(\Exception::class);
        $this->expectedExceptionMessage = 'Pessoa não encontrada';
        $this->memoryRepository->find(1);
    }

}
