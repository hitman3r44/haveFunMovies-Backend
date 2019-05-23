<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Libraries\TMDB\TmdbApi;
use App\Model\AdminVideo;
use App\Model\CastCrew;
use App\Model\Category;
use App\Model\TmdbGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

            $genres = TmdbGenre::all();

            $model = new AdminVideo;

            $videoimages = [];
            $model->trailer_video_resolutions = [];
            $model->video_resolutions = [];

            dd($tmdbVideo);

            if ($tmdbVideo->hasData()) {

                $genre = $tmdbVideo->getGenre();
                $model->title = $tmdbVideo->getTitle();
                $model->description = $tmdbVideo->getOverview();
                $model->details = $tmdbVideo->getOverview();
                $model->trailer_video = 'https://www.youtube.com/watch?v=' . $tmdbVideo->getTrailer();
                $model->ratings = round($tmdbVideo->getVoteAverage() / 2);
                $model->default_image = $imageUrl . $tmdbVideo->getPoster();
                $model->duration = date('H:i:s', mktime(0, $tmdbVideo->get('runtime')));

                $model->genre_id = isset($genre['id']) ? $genre['id'][0] : null;

                $videoimages[0] = new \stdClass();
                $videoimages[1] = new \stdClass();

                $videoimages[0]->image = isset($tmdbVideo->getPostersWithUrl($imageUrl, 1, 1)[0]) ? $tmdbVideo->getPostersWithUrl($imageUrl, 1, 1)[0] : asset('images/default.png');
                $videoimages[1]->image = isset($tmdbVideo->getPostersWithUrl($imageUrl, 1, 2)[0]) ? $tmdbVideo->getPostersWithUrl($imageUrl, 1, 2)[0] : asset('images/default.png');
            }

            $video_cast_crews = [];

            $cast_crews = CastCrew::select('id', 'name')->get();

            return view('admin.videos.upload_by_tmdb', compact('categories', 'model',
                'videoimages', 'cast_crews', 'tmdbVideo', 'genres'))
                ->with('page', 'videos')
                ->with('sub_page', 'admin_videos_create');

        } catch (\Exception $e) {

            dd($e);
            return response()->json(['status' => 0, 'html' => $e->getMessage()]);
        }
    }

    public function tmdbVideosSave(Request $request)
    {

        try {


            $tmdbVideo = $this->tmdbApi->getMovieDetails($request->tmdb_video_id);

            $this->validate($request, [
                'title' => 'required|max:255|min:4',
                'description' => 'required',
                'video' => !empty($request->admin_video_id) ? 'mimes:mp4' : 'required|mimes:mp4',
                'default_image'=> $tmdbVideo->hasData() ? '' : ($request->admin_video_id ? 'mimes:png,jpeg,jpg' : 'required|mimes:png,jpeg,jpg'),
                'other_image1'=> $request->has('tmdb_video_id') ? '' : ($request->admin_video_id ? 'mimes:png,jpeg,jpg' : 'required|mimes:png,jpeg,jpg'),
                'other_image2'=> $request->has('tmdb_video_id') ? '' : ($request->admin_video_id ? 'mimes:png,jpeg,jpg' : 'required|mimes:png,jpeg,jpg'),

            ]);
            dd($request->all());



            DB::beginTransaction();

            if ($request->admin_video_id != '') {

                $model = AdminVideo::find($request->admin_video_id);
            } else {

                $model = new AdminVideo();
            }
            $model->tmdb_video_id = $request->tmdb_video_id;
            $model->title = $request->title;
            $model->unique_id = seoUrl($request->title);
            $model->description = $request->description;
            $model->age = 16;
            $model->details = $request->description;
            $model->category_id = $request->category_id;
            $model->sub_category_id = $request->sub_category_id;
            $model->ratings = $request->ratings;
            $model->reviews = $request->ratings;

            $model->default_image = '';
            $model->video_gif_image = '';
            $model->video_image_mobile = '';
            $model->banner_image = '';
            $model->is_banner = 0;
            $model->ppv_created_by = '';
            $model->watch_count = 0;
            $model->is_pay_per_view = 0;
            $model->redeem_amount = 0;
            $model->admin_amount = 0;
            $model->user_amount = 0;
            $model->trailer_subtitle = '';
            $model->video_subtitle = '';


            $model->genre_id = '';
            $model->video = '';

            if ($tmdbVideo->hasData()) {
                $model->trailer_video = 'https://www.youtube.com/watch?v=' . $tmdbVideo->getTrailer();
            }

            $model->status = 1;
            $model->is_approved = 1;
            $model->is_home_slider = 0;
            $model->uploaded_by = Auth::user()->id;
            $model->publish_time;
            $model->duration;
            $model->trailer_duration;
            $model->video_resolutions->nullable();
            $model->trailer_video_resolutions->nullable();
            $model->compress_status->default(0);
            $model->main_video_compress_status;
            $model->trailer_compress_status->default(0);
            $model->video_resize_path->nullable();
            $model->trailer_resize_path->nullable();
            $model->edited_by = 'admin';
            $model->watch_count;
            $model->is_pay_per_view;
            $model->type_of_user->default(0);
            $model->type_of_subscription->default(0);
            $model->amount;
            $model->video_type;
            $model->video_upload_type;
            $model->position;

            if ($tmdbVideo->hasData()) {

                $model->trailer_video = 'https://www.youtube.com/watch?v=' . $tmdbVideo->getTrailer();
                $model->default_image = $this->tmdbApi->getImageURL('w300').$tmdbVideo->getPoster();
            }


            if ($request->hasFile('video')) {

                if ($request->admin_video_id) {

                    Helper::s3_delete_picture($model->video);
                }
                $model->video = Helper::upload_file_to_s3($request->file('video'));

            }

            if($request->hasFile('video_subtitle')) {

                if ($model->video_subtitle) {

                    Helper::delete_picture($model->video_subtitle, "/uploads/subtitles/");

                }
                $model->video_subtitle =  Helper::subtitle_upload($request->file('video_subtitle'));
            }

        DB::commit();

        $response_array = ['success' => true, 'message' => tr('video_upload_success'), 'data' => $video_model];

        return response()->json($response_array);

        } catch (\Exception $e) {

            DB::rollback();

            $response_array = ['success' => false, 'error_messages' => $e->getMessage(), 'error_code' => $e->getCode()];

            return response()->json($response_array);

        }

    }
}
