<?php

namespace Tests\Feature;

use Domain\Clients\Client;
use Domain\Subscriptions\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group client_sub
 */
class ClientSubscriptionTest extends TestCase
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
    public function should_return_all_clients_subscriptions()
    {
        $client = Client::find(1);
        $client->subscriptions()->attach([1, 2]);

        $response = $this->getJson('/api/v1/clients/1/subs')
                        ->assertStatus(200)
                        ;

        $responseData = $response->json();

        $this->assertArrayHasKey('id', $responseData[0]);
        $this->assertArrayHasKey('name', $responseData[0]);
        $this->assertCount(2, $responseData);
    }

    /**
     * @test
     */
    public function should_attach_subscription_to_client()
    {
        $client = Client::find(1);
        $this->assertSame(0, $client->subscriptions()->count());

        $this->postJson('/api/v1/clients/1/subs/1')->assertStatus(204);
        $client = Client::find(1);
        $this->assertSame(1, $client->subscriptions()->count());
    }

    /**
     * @test
     */
    public function should_return_correct_code_when_attaching_not_existing_entities()
    {
        $this->postJson('/api/v1/clients/6/subs/1')->assertStatus(404);
        $this->postJson('/api/v1/clients/1/subs/10')->assertStatus(404);
    }

    /**
     * @test
     */
    public function should_detach_subscription_from_client()
    {
        $client = Client::find(1);
        $client->subscriptions()->attach([1, 2]);
        $this->assertSame(2, $client->subscriptions()->count());

        $this->deleteJson('/api/v1/clients/1/subs/1')->assertStatus(204);
        $client = Client::find(1);
        $this->assertSame(1, $client->subscriptions()->count());

        $this->getJson('/api/v1/clients/1/subs')->assertJsonMissing(["id" => 1]);
    }

    /**
     * @test
     */
    public function should_return_correct_code_when_detaching_not_existing_entities()
    {
        $this->deleteJson('/api/v1/clients/6/subs/1')->assertStatus(404);
        $this->deleteJson('/api/v1/clients/1/subs/10')->assertStatus(404);
    }
}
