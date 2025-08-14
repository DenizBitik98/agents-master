<?php

namespace App\Repository;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;

class AnnouncementRepository extends BaseRepository
{
    public function __construct(Announcement $model)
    {
        $this->model = $model;
    }

    public function getAllAnnouncement()
    {
        return $this->model->orderBy('id')->get();
    }

    public function createAnnouncement(array $data): Model
    {
        return $this->model->create($data);
    }

    public function updateAnnouncement(int $id, array $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }


    public function deleteAnnouncement(int $id)
    {
        $model = $this->find($id);
        return $model->delete();

    }

    public function getById(int $id): Model
    {
        return $this->model->find($id);
    }
}
