<?php

namespace App\Clients\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Infrastructure\Clients\Client;
use Infrastructure\Videos\Video;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @apiDefine ResourceNotFoundError
 *
 * @apiError 404 ResourceNotFound The requested resource was not found.
 */
class ClientVideoController extends Controller
{
    /**
     * @api {get} /clients/:id/videos Display client's videos.
     * @apiParam {Number} id Client unique ID
     *
     * @apiVersion 0.1.0
     * @apiName GetClientVids
     * @apiGroup Clients_Videos
     *
     * @apiSuccess (200) {Object[]} video Client videos data.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function listClientVideos($id)
    {
        $client = Client::findOrFail($id);
        return new JsonResponse($client->allVideos(), 200);
    }

    /**
     * @api {get} /clients/:id/videos/:id Verify client's video entitlement.
     * @apiParam {Number} id Client unique ID
     * @apiParam {Number} id Video unique ID
     *
     * @apiVersion 0.1.0
     * @apiName GetClientVideo
     * @apiGroup Clients_Videos
     *
     * @apiSuccess (200) {Object} video If client owns video - returns video data.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param  $id
     * @param  $vid_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientVideoData($id, $vid_id)
    {
        $client = Client::findOrFail($id);
        $ownedVideos = $client->allVideos();
        $checkOwnership = $ownedVideos->where('id', $vid_id)->count();

        if($checkOwnership === 0){
            throw new NotFoundHttpException('Resource not found', null, 404);
        }

        return Video::find($vid_id);
    }

    /**
     * @api {post} /clients/:id/videos/:id Client's new video.
     * @apiParam {Number} id Client unique ID
     * @apiParam {Number} id Video unique ID
     *
     * @apiVersion 0.1.0
     * @apiName PostClientVideo
     * @apiGroup Clients_Videos
     *
     * @apiSuccess 204 Video added.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param  $id
     * @param  $vid_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientAddsVideo($id, $vid_id)
    {
        $client = Client::findOrFail($id);
        $vid = Video::findOrFail($vid_id);
        $client->videos()->attach($vid->id);
        return new JsonResponse('', 204);
    }

    /**
     * @api {delete} /clients/:id/videos/:id Client's video removed.
     * @apiParam {Number} id Client unique ID
     * @apiParam {Number} id Video unique ID
     *
     * @apiVersion 0.1.0
     * @apiName DeleteClientVideo
     * @apiGroup Clients_Videos
     *
     * @apiSuccess 204 Video added.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param  $id
     * @param  $vid_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeClientVideo($id, $vid_id)
    {
        $client = Client::findOrFail($id);
        $vid = Video::findOrFail($vid_id);
        $client->videos()->detach($vid->id);
        return new JsonResponse('', 204);
    }
}