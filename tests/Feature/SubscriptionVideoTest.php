<?php

namespace Tests\Feature;

use Infrastructure\Subscriptions\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group sub_video
 */
class SubscriptionVideoTest extends TestCase
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
        $sub = Subscription::find(1);
        $sub->videos()->attach([1, 2, 3]);

        $response = $this->getJson('/api/v1/subs/1/videos')->assertStatus(200);

        $responseData = $response->json();

        $this->assertArrayHasKey('id', $responseData[0]);
        $this->assertSame(3, count($responseData));
    }

    /**
     * @test
     */
    public function should_attach_video_to_subscription()
    {
        $sub = Subscription::find(1);
        $this->assertSame(0, $sub->videos()->count());

        $this->postJson('/api/v1/subs/1/videos/1')->assertStatus(204);
        $sub = Subscription::find(1);
        $this->assertSame(1, $sub->videos()->count());
    }

    /**
     * @test
     */
    public function should_return_correct_code_when_attaching_not_existing_entities()
    {
        $this->postJson('/api/v1/subs/3/videos/1')->assertStatus(404);
        $this->postJson('/api/v1/subs/1/videos/10')->assertStatus(404);
    }

    /**
     * @test
     */
    public function should_detach_video_from_subscription()
    {
        $sub = Subscription::find(1);
        $sub->videos()->attach([1, 2, 3]);
        $this->assertSame(3, $sub->videos()->count());

        $this->deleteJson('/api/v1/subs/1/videos/1')->assertStatus(204);
        $sub = Subscription::find(1);
        $this->assertSame(2, $sub->videos()->count());

        $this->getJson('/api/v1/subs/1/videos')->assertJsonMissing(["id" => 1]);
    }

    /**
     * @test
     */
    public function should_return_correct_code_when_detaching_not_existing_entities()
    {
        $this->deleteJson('/api/v1/subs/3/videos/1')->assertStatus(404);
        $this->deleteJson('/api/v1/subs/1/videos/10')->assertStatus(404);
    }
}
