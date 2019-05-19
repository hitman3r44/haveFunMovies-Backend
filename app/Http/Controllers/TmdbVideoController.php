<?php

namespace App\Http\Controllers;

use App\Libraries\TMDB\TmdbApi;
use App\Model\AdminVideo;
use App\Model\CastCrew;
use App\Model\Category;
use Illuminate\Http\Request;

class TmdbVideoController extends Controller
{
    private $tmdbApi;

    public function __construct()
    {
        $this->tmdbApi = new TmdbApi();

    }

    public function tmdbVideosSearch(Request $request)
    {
        return view('admin.videos.search_tmdb')->with('page', 'videos');
    }


    public function getSearchVideosResult(Request $request)
    {
        try {
            $this->validate($request, [
                'movie_name' => 'required',
            ]);

            $movies = $this->tmdbApi->searchTmdbMovie($request->movie_name);

            $viewData = strval(view('admin.videos.ajax_videos.movie_list', compact('movies')));

            return response()->json([
                'status' => 1,
                'html' => $viewData,
            ]);

        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'html' => $e->getMessage()]);
        }
    }


    public function tmdbVideosCreate(Request $request, $videoId)
    {

        try {

            $tmdbVideo = $this->tmdbApi->getMovieDetails($videoId);

            $imageUrl = $this->tmdbApi->getImageURL('w300');


            $categories = Category::where('categories.is_approved', DEFAULT_TRUE)
                ->get([
                    'categories.id as id',
                    'categories.name',
                    'categories.picture',
                    'categories.is_series',
                    'categories.status',
                    'categories.is_approved',
                ]);

            $model = new AdminVideo;

            $videoimages = [];
            $model->trailer_video_resolutions = [];
            $model->video_resolutions = [];

            if($tmdbVideo->hasData()){
                $model->title = $tmdbVideo->getTitle();
                $model->description = $tmdbVideo->getOverview();
                $model->details = $tmdbVideo->getOverview();
                $model->trailer_video = 'https://www.youtube.com/watch?v='.$tmdbVideo->getTrailer();
                $model->ratings = round($tmdbVideo->getVoteAverage()/ 2);
                $model->default_image = $imageUrl . $tmdbVideo->getPoster();

                $videoimages[0] = new \stdClass();
                $videoimages[1] = new \stdClass();

                $videoimages[0]->image = isset($tmdbVideo->getPostersWithUrl($imageUrl, 1, 1)[0]) ? $tmdbVideo->getPostersWithUrl($imageUrl, 1, 1)[0] : asset('images/default.png');
                $videoimages[1]->image = isset($tmdbVideo->getPostersWithUrl($imageUrl, 1, 2)[0]) ? $tmdbVideo->getPostersWithUrl($imageUrl, 1, 2)[0] : asset('images/default.png');

            }

            $video_cast_crews = [];

            $cast_crews = CastCrew::select('id', 'name')->get();

            return view('admin.videos.upload_by_tmdb', compact('categories', 'model',
                'videoimages','cast_crews','tmdbVideo'))
                ->with('page', 'videos')
                ->with('sub_page', 'admin_videos_create');

        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'html' => $e->getMessage()]);
        }
    }
}
