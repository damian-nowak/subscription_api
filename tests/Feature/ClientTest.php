<?php

namespace Tests\Feature;

use Domain\Clients\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory;


/**
 * @group latest
 */
class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('DatabaseSeeder');
    }

    /**
     * @test
     */
    public function should_return_all_clients()
    {
        $response = $this->getJson('/api/v1/clients')->assertStatus(200);

        $responseData = $response->json();

        $this->assertArrayHasKey('id', $responseData[0]);
        $this->assertSame(5, count($responseData));
    }

    /**
     * @test
     */
    public function should_return_needed_client()
    {
        $response = $this->getJson('/api/v1/clients/1')->assertStatus(200);
        $client = Client::find(1);

        $responseData = $response->json();

        $this->assertArrayHasKey('id', $responseData);
        $this->assertSame($client->name, $responseData['name']);
    }

    /**
     * @test
     */
    public function should_return_error_when_client_not_found()
    {
        $response = $this->getJson('/api/v1/clients/6')->assertStatus(404);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData);
        $this->assertSame("Resource not found", $responseData['data']);
    }

    /**
     * @test
     */
    public function should_delete_client()
    {
        $clientsBefore = Client::all()->count();
        $this->assertSame(5, $clientsBefore);

        $this->deleteJson('/api/v1/clients/1')->assertStatus(204);
        $clientsAfter = Client::all()->count();
        $this->assertSame(4, $clientsAfter);

        $this->getJson('/api/v1/clients/1')->assertStatus(404);
    }

    /**
     * @test
     */
    public function should_not_delete_when_client_not_found()
    {
        $response = $this->deleteJson('/api/v1/clients/6')->assertStatus(404);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData);
        $this->assertSame("Resource not found", $responseData['data']);
    }

    /**
     * @test
     */
    public function should_update_client()
    {
        $faker = Factory::create();
        $payload = [
            'name' => $faker->name,
            'email' => $faker->email,
        ];

        $response = $this->putJson('/api/v1/clients/1', $payload)->assertStatus(200);
        $responseData = $response->json();

        $this->assertSame($payload['name'], $responseData['name']);
    }

    /**
     * @test
     */
    public function should_not_update_client_with_wrong_data()
    {
        $faker = Factory::create();
        $payload = [
            'name' => 1111,
            'email' => $faker->name,
        ];

        $response = $this->putJson('/api/v1/clients/1', $payload)->assertStatus(422);
        $responseData = $response->json();

        $this->assertArrayHasKey('message', $responseData);
        $this->assertSame('The email must be a valid email address.', $responseData['errors']['email'][0]);
        $this->assertSame('The name must be a string.', $responseData['errors']['name'][0]);

        $client = Client::find(2);

        $payload = [
            'email' => $client->email
        ];

        $response = $this->putJson('/api/v1/clients/1', $payload)->assertStatus(422);
        $responseData = $response->json();
        $this->assertSame('The email has already been taken.', $responseData['errors']['email'][0]);
    }

    /**
     * @test
     */
    public function should_create_client()
    {
        $clientsCountBefore = Client::all()->count();
        $faker = Factory::create();
        $payload = [
            'name' => $faker->name,
            'email' => $faker->email,
        ];

        $this->postJson('/api/v1/clients/', $payload)->assertStatus(201);
        $clientsCountAfter = Client::all()->count();

        $this->assertGreaterThan($clientsCountBefore, $clientsCountAfter);
    }
}
