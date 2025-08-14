<?php

namespace App\Http\Controllers;

use App\Http\Requests\Announcement\AnnouncementRequest;
use App\Repository\AnnouncementRepository;
use Illuminate\Http\Request;


class AnnouncementController extends Controller
{

    public function __construct(AnnouncementRepository  $repo) {
        $this->repo = $repo;
    }
        public function getAnnouncement()
        {
            $data =  $this->repo->getAllAnnouncement();

            return view('announcement.index',  [
                'data' => $data
            ]);
        }

    public function createAnnoucement(AnnouncementRequest $request)
    {
        $data = $request->validated();

        $this->repo->createAnnouncement($data);
        return redirect(route('getAnnouncement'))->with('success');
    }


    public function createView()
    {
        return view('announcement.create');
    }

    public function edit(Request $request, int $id)
    {
        $data = $request->all();

        return $this->repo->updateAnnouncement($id, $data);

    }

    public function delete(int $id )
    {
         $this->repo->deleteAnnouncement($id );
        return redirect(route('getAnnouncement'))->with('success');
    }
}
