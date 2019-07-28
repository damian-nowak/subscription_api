<?php

namespace Infrastructure\Videos;

use Domain\Contracts\Repositories\RepositoryInterface;
use Infrastructure\Videos\Video;

class VideoRepository implements RepositoryInterface
{
    protected $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    public function findAll()
    {
        return $this->video::all();
    }

    public function find($id)
    {
        return $this->video::findOrFail($id);
    }

    public function create($data)
    {
        return $this->video::create([
            'title' => $data['title']
        ]);
    }

    public function update($id, $data)
    {
        $vidToUpdate = $this->video::findOrFail($id);

        empty($data['title']) ?: $vidToUpdate->update([
            'title' => $data['title']
        ]);

        return $vidToUpdate;
    }

    public function delete($id)
    {
        $clientToDelete = $this->video::findOrFail($id);
        return $clientToDelete->delete();
    }
}