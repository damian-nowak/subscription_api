<?php

namespace App\Videos\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Videos\Http\Requests\VideoUpdateRequest;
use App\Videos\Http\Requests\VideoCreateRequest;
use Illuminate\Http\JsonResponse;
use App\Videos\Services\VideoApplicationService;

/**
 * @apiDefine ResourceNotFoundError
 *
 * @apiError 404 ResourceNotFound The requested resource was not found.
 */

/**
 * @apiDefine InvalidDataError
 *
 * @apiError 422 InvalidDataError The payload sent with request has invalid / is missing needed data.
 */
class VideoController extends Controller
{
    public $appService;

    public function __construct(VideoApplicationService $appService)
    {
        $this->appService = $appService;
    }

    /**
     * @api {get} /videos Request all videos
     * @apiVersion 0.1.0
     * @apiName GetVideos
     * @apiGroup Videos
     *
     * @apiSuccess {Object[]} video List of all videos.
     *
     * @return \Illuminate\Http\Response
     */
    public function listVideos()
    {
        return $this->appService->findAll();
    }

    /**
     * @api {post} /subs Store a newly created video.
     * @apiVersion 0.1.0
     * @apiName PostVideo
     * @apiGroup Videos
     *
     * @apiParam {String} name  required video name
     *
     * @apiSuccess (201) {Object} video New video data.
     *
     * @apiUse InvalidDataError
     *
     * @param  VideoCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function newVideo(VideoCreateRequest $request)
    {
        $data = $request->only('title');
        return $this->appService->create($data);
    }

    /**
     * @api {get} /subs/:id Display the specified video.
     * @apiParam {Number} id Video's unique ID
     *
     * @apiVersion 0.1.0
     * @apiName GetVideo
     * @apiGroup Videos
     *
     * @apiSuccess (200) {Object} video Video's data.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param int $vid_id
     * @return \Illuminate\Http\Response
     */
    public function showVideoData($vid_id)
    {
        return $this->appService->find($vid_id);
    }

    /**
     * @api {put} /subs/:id Update video data.
     * @apiParam {Number} id Video's unique ID
     *
     * @apiVersion 0.1.0
     * @apiName PutVideo
     * @apiGroup Videos
     *
     * @apiParam {String} name  new video name
     *
     * @apiSuccess (200) {Object} video Updated video's data.
     *
     * @apiUse ResourceNotFoundError
     * @apiUse InvalidDataError
     *
     * @param  VideoUpdateRequest  $request
     * @param int $vid_id
     * @return \Illuminate\Http\Response
     */
    public function updateVideoData(VideoUpdateRequest $request, $vid_id)
    {
        $data = $request->only('title');
        return $this->appService->update($vid_id, $data);
    }

    /**
     * @api {delete} /subs/:id Remove video.
     * @apiParam {Number} id Video's unique ID
     *
     * @apiVersion 0.1.0
     * @apiName DeleteVideo
     * @apiGroup Videos
     *
     * @apiSuccess 204 Video removed.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param int $vid_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeVideo($vid_id)
    {
        $this->appService->delete($vid_id);
        return new JsonResponse('', 204);
    }
}
