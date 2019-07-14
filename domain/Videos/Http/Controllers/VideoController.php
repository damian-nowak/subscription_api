<?php

namespace Domain\Videos\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Domain\Videos\Video;
use Domain\Videos\Http\Requests\VideoUpdateRequest;
use Domain\Videos\Http\Requests\VideoCreateRequest;
use Illuminate\Http\JsonResponse;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Video::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VideoCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoCreateRequest $request)
    {
        return Video::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Video $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return $video;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VideoUpdateRequest  $request
     * @param  Video $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoUpdateRequest $request, Video $video)
    {
        $video->update($request->all());
        return $video;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Video $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return new JsonResponse('', 204);
    }
}
