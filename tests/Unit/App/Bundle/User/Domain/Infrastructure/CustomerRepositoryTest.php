<?php

namespace Tests\Unit\App\Bundle\User\Domain\Infrastructure;

use App\Bundle\User\Infrastructure\CustomerRepository;
use App\Models\Customer;
use Illuminate\Database\Connection;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\SQLiteGrammar;
use Illuminate\Database\Query\Processors\Processor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Mockery as m;
use Faker\Factory as Faker;

class CustomerRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $customer;
    protected $customerRepository;
    protected $faker;
    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->customer = [
            'name' => $this->faker->name,
            'description' => $this->faker->name,
        ];

        $this->customerRepository = new CustomerRepository();
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }

    protected function mockDatabaseConnection()
    {
        $connection = m::mock(Connection::class);

        $connection->allows()
            ->table()
            ->with(m::any())
            ->andReturnUsing(function ($table) use ($connection) {
                return (new Builder(
                    $connection,
                    new SQLiteGrammar(),
                    new Processor()
                ))->from($table);
            });

        return $connection;
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_show()
    {
        $customer = Customer::factory()->create();
        $found = $this->customerRepository->find($customer->id);
        $this->assertInstanceOf(Customer::class, $found);
    }

    public function test_store()
    {
        $customer = $this->customerRepository->create($this->customer);
        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertEquals($this->customer['name'], $customer->name);
        $this->assertDatabaseHas('customers', $this->customer);
    }
}
