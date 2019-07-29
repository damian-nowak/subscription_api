<?php

namespace App\Clients\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Clients\Services\ClientApplicationService;


/**
 * @apiDefine ResourceNotFoundError
 *
 * @apiError 404 ResourceNotFound The requested resource was not found.
 */
class ClientVideoController extends Controller
{
    public $appService;

    public function __construct(ClientApplicationService $appService)
    {
        $this->appService = $appService;
    }

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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function listClientVideos($id)
    {
        $clientVideos = $this->appService->listClientVideos($id);
        return new JsonResponse($clientVideos, 200);
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
     * @param int $id
     * @param int $vid_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientVideoData($id, $vid_id)
    {
        $clientVideo = $this->appService->clientVideoData($id, $vid_id);
        return new JsonResponse($clientVideo, 200);
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
     * @param int $id
     * @param int $vid_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientAddsVideo($id, $vid_id)
    {
        $this->appService->clientAddsVideo($id, $vid_id);
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
     * @param int $id
     * @param int $vid_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeClientVideo($id, $vid_id)
    {
        $this->appService->removeClientVideo($id, $vid_id);
        return new JsonResponse('', 204);
    }
}
