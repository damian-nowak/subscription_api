<?php

namespace Domain\Clients\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Domain\Clients\Client;
use Domain\Videos\Video;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClientVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function listClientVideos(Client $client)
    {
        return new JsonResponse($client->allVideos(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Client $client
     * @param  Video $video
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientVideoData(Client $client, Video $video)
    {
        $ownedVideos = $client->allVideos();
        $checkOwnership = $ownedVideos->where('id', $video->id)->count();

        if($checkOwnership === 0){
            throw new NotFoundHttpException('Resource not found', null, 404);
        }

        return $video;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Client $client
     * @param  Video $video
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientAddsVideo(Client $client, Video $video)
    {
        $client->videos()->attach($video);
        return new JsonResponse('', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @param  Video $video
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeClientVideo(Client $client, Video $video)
    {
        $client->videos()->detach($video);
        return new JsonResponse('', 204);
    }
}
