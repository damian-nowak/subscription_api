<?php

namespace Tests\Feature;

use Domain\Clients\Client;
use Domain\Subscriptions\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group latest
 */
class ClientVideoTest extends TestCase
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
    public function should_return_client_videos()
    {
        $client = Client::find(1);
        $client->videos()->attach([1, 2]);

        $response = $this->getJson('/api/v1/clients/1/videos')
                        ->assertStatus(200)
                        ;

        $responseData = $response->json();

        $this->assertArrayHasKey('id', $responseData[0]);
        $this->assertArrayHasKey('title', $responseData[0]);
        $this->assertCount(2, $responseData);
    }

    /**
     * @test
     */
    public function should_attach_video_to_client()
    {
        $client = Client::find(1);
        $this->assertSame(0, $client->videos()->count());

        $this->postJson('/api/v1/clients/1/videos/1')->assertStatus(204);
        $client = Client::find(1);
        $this->assertSame(1, $client->videos()->count());
    }

    /**
     * @test
     */
    public function should_return_correct_code_when_attaching_not_existing_entities()
    {
        $this->postJson('/api/v1/clients/6/videos/1')->assertStatus(404);
        $this->postJson('/api/v1/clients/1/videos/10')->assertStatus(404);
    }

    /**
     * @test
     */
    public function should_detach_video_from_client()
    {
        $client = Client::find(1);
        $client->videos()->attach([1, 2]);
        $this->assertSame(2, $client->videos()->count());

        $this->deleteJson('/api/v1/clients/1/videos/1')->assertStatus(204);
        $client = Client::find(1);
        $this->assertSame(1, $client->videos()->count());

        $this->getJson('/api/v1/clients/1/videos')->assertJsonMissing(["id" => 1]);
    }

    /**
     * @test
     */
    public function should_return_correct_code_when_detaching_not_existing_entities()
    {
        $this->deleteJson('/api/v1/clients/6/videos/1')->assertStatus(404);
        $this->deleteJson('/api/v1/clients/1/videos/10')->assertStatus(404);
    }

    /**
     * @test
     */
    public function should_return_client_unique_videos_and_subbed_videos()
    {
        // first only videos are attached
        $client = Client::find(1);
        $client->videos()->attach([1, 2]);

        $response = $this->getJson('/api/v1/clients/1/videos')
                        ->assertStatus(200)
                        ;

        $responseData = $response->json();
        $this->assertCount(2, $responseData);

        // next, subscription is added
        $sub = Subscription::find(1);
        $sub->videos()->attach(3);
        $client->subscriptions()->attach(1);

        $response = $this->getJson('/api/v1/clients/1/videos')
                        ->assertStatus(200)
                        ;

        $responseData = $response->json();
        $this->assertCount(3, $responseData);

        // then, video same as in subscription is added
        $client->videos()->attach(3);
        $response = $this->getJson('/api/v1/clients/1/videos')
                        ->assertStatus(200)
                        ;

        $responseData = $response->json();
        $this->assertCount(3, $responseData);

        // second subscription is added
        $sub2 = Subscription::find(2);
        $sub2->videos()->attach([1, 5]);
        $client->subscriptions()->attach(2);

        $response = $this->getJson('/api/v1/clients/1/videos')
                        ->assertStatus(200)
                        ;

        $responseData = $response->json();
        $this->assertCount(4, $responseData);
    }

    /**
     * @test
     */
    public function should_return_client_video_data_when_owned_or_404()
    {
        // client with videos and subscription
        $client = Client::find(1);
        $client->videos()->attach([1, 2]);
        $sub = Subscription::find(1);
        $sub->videos()->attach(3);
        $client->subscriptions()->attach(1);

        $this->getJson('/api/v1/clients/1/videos/3')
            ->assertStatus(200)
            ->assertJsonFragment(["id" => 3])
            ;

        $response = $this->getJson('/api/v1/clients/1/videos/4')
            ->assertStatus(404);
    }
}
