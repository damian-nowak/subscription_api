<?php

namespace Tests\Feature;

use Infrastructure\Videos\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory;
use Tests\TestCase;

/**
 * @group video
 */
class VideoTest extends TestCase
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
    public function should_return_all_videos()
    {
        $response = $this->getJson('/api/v1/videos')->assertStatus(200);

        $responseData = $response->json();

        $this->assertArrayHasKey('id', $responseData[0]);
        $this->assertSame(5, count($responseData));
    }

    /**
     * @test
     */
    public function should_return_needed_video()
    {
        $response = $this->getJson('/api/v1/videos/1')->assertStatus(200);
        $video = Video::find(1);

        $responseData = $response->json();

        $this->assertArrayHasKey('id', $responseData);
        $this->assertSame($video->title, $responseData['title']);
    }

    /**
     * @test
     */
    public function should_return_error_when_video_not_found()
    {
        $response = $this->getJson('/api/v1/videos/6')->assertStatus(404);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData);
        $this->assertSame("Resource not found", $responseData['data']);
    }

    /**
     * @test
     */
    public function should_delete_video()
    {
        $videosBefore = Video::all()->count();
        $this->assertSame(5, $videosBefore);

        $this->deleteJson('/api/v1/videos/1')->assertStatus(204);
        $videosAfter = Video::all()->count();
        $this->assertSame(4, $videosAfter);

        $this->getJson('/api/v1/videos/1')->assertStatus(404);
    }

    /**
     * @test
     */
    public function should_not_delete_when_video_not_found()
    {
        $response = $this->deleteJson('/api/v1/videos/6')->assertStatus(404);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData);
        $this->assertSame("Resource not found", $responseData['data']);
    }

    /**
     * @test
     */
    public function should_update_video()
    {
        $faker = Factory::create();
        $payload = [
            'title' => ucfirst($faker->words(3, true))
        ];

        $response = $this->putJson('/api/v1/videos/1', $payload)->assertStatus(200);
        $responseData = $response->json();

        $this->assertSame($payload['title'], $responseData['title']);
    }

    /**
     * @test
     */
    public function should_not_update_video_with_wrong_data()
    {
        $faker = Factory::create();
        $payload = [
            'title' => 1111
        ];

        $response = $this->putJson('/api/v1/videos/1', $payload)->assertStatus(422);
        $responseData = $response->json();

        $this->assertArrayHasKey('message', $responseData);
        $this->assertSame('The title must be a string.', $responseData['errors']['title'][0]);
    }

    /**
     * @test
     */
    public function should_create_video()
    {
        $videosCountBefore = Video::all()->count();
        $faker = Factory::create();
        $payload = [
            'title' => ucfirst($faker->words(3, true))
        ];

        $this->postJson('/api/v1/videos/', $payload)->assertStatus(201);
        $videosCountAfter = Video::all()->count();

        $this->assertGreaterThan($videosCountBefore, $videosCountAfter);
    }
}
