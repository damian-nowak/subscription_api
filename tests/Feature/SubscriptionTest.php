<?php

namespace Tests\Feature;

use Domain\Subscriptions\Subscription;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory;

/**
 * @group subscription
 */
class SubscriptionTest extends TestCase
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
    public function should_return_all_subscriptions()
    {
        $response = $this->getJson('/api/v1/subs')->assertStatus(200);

        $responseData = $response->json();

        $this->assertArrayHasKey('id', $responseData[0]);
        $this->assertSame(2, count($responseData));
    }

    /**
     * @test
     */
    public function should_return_needed_subscription()
    {
        $response = $this->getJson('/api/v1/subs/1')->assertStatus(200);
        $sub = Subscription::find(1);

        $responseData = $response->json();

        $this->assertArrayHasKey('id', $responseData);
        $this->assertSame($sub->name, $responseData['name']);
    }

    /**
     * @test
     */
    public function should_return_error_when_subscription_not_found()
    {
        $response = $this->getJson('/api/v1/subs/6')->assertStatus(404);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData);
        $this->assertSame("Resource not found", $responseData['data']);
    }

    /**
     * @test
     */
    public function should_delete_subscription()
    {
        $subsBefore = Subscription::all()->count();
        $this->assertSame(2, $subsBefore);

        $this->deleteJson('/api/v1/subs/1')->assertStatus(204);
        $subsAfter = Subscription::all()->count();
        $this->assertSame(1, $subsAfter);

        $this->getJson('/api/v1/subs/1')->assertStatus(404);
    }

    /**
     * @test
     */
    public function should_not_delete_when_subscription_not_found()
    {
        $response = $this->deleteJson('/api/v1/subs/6')->assertStatus(404);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData);
        $this->assertSame("Resource not found", $responseData['data']);
    }

    /**
     * @test
     */
    public function should_update_subscription()
    {
        $faker = Factory::create();
        $payload = [
            'name' => ucwords($faker->words(2, true))
        ];

        $response = $this->putJson('/api/v1/subs/1', $payload)->assertStatus(200);
        $responseData = $response->json();

        $this->assertSame($payload['name'], $responseData['name']);
    }

    /**
     * @test
     */
    public function should_not_update_subscription_with_wrong_data()
    {
        $faker = Factory::create();
        $payload = [
            'name' => 1111
        ];

        $response = $this->putJson('/api/v1/subs/1', $payload)->assertStatus(422);
        $responseData = $response->json();

        $this->assertArrayHasKey('message', $responseData);
        $this->assertSame('The name must be a string.', $responseData['errors']['name'][0]);
    }

    /**
     * @test
     */
    public function should_create_subscription()
    {
        $subsCountBefore = Subscription::all()->count();
        $faker = Factory::create();
        $payload = [
            'name' => ucwords($faker->words(2, true))
        ];

        $this->postJson('/api/v1/subs/', $payload)->assertStatus(201);
        $subsCountAfter = Subscription::all()->count();

        $this->assertGreaterThan($subsCountBefore, $subsCountAfter);
    }
}
