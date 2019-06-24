<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Libraries\TMDB\TmdbApi;
use App\Libraries\Utility;
use App\Model\AdminVideo;
use App\Model\AdminVideoImage;
use App\Model\CastCrew;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\TmdbGenre;
use App\Model\VideoCastCrew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Setting;

class AdminVideoController extends Controller
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

            $viewData = (string)view('admin.videos.ajax_videos.movie_list', compact('movies'));

            return response()->json([
                'status' => 1,
                'html' => $viewData,
            ]);

        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'html' => $e->getMessage()]);
        }
    }


    public function tmdbVideosCreate(Request $request, $videoId = null)
    {
        try {

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

            if ($videoId != null) {

                $tmdbVideo = $this->tmdbApi->getMovieDetails($videoId);

                $imageUrl = $this->tmdbApi->getImageURL('w300');

                if ($tmdbVideo->hasData()) {

                    $genre = $tmdbVideo->getGenre();
                    $model->title = $tmdbVideo->getTitle();
                    $model->description = $tmdbVideo->getOverview();
                    $model->details = $tmdbVideo->getOverview();
                    $model->trailer_video = ($tmdbVideo->getTrailer()) ? 'https://www.youtube.com/embed/' . $tmdbVideo->getTrailer() : null;
                    $model->ratings = round($tmdbVideo->getVoteAverage() / 2);
                    $model->default_image = ($tmdbVideo->getPoster()) ? $imageUrl . $tmdbVideo->getPoster() : null;
                    $model->duration = ($tmdbVideo->get('runtime')) ? date('H:i:s', mktime(0, $tmdbVideo->get('runtime'))) : null;

                    $model->genre_id = isset($genre['id'][0]) ? $genre['id'][0] : null;

                    $videoimages[0] = new \stdClass();
                    $videoimages[1] = new \stdClass();

                    $videoimages[0]->image = isset($tmdbVideo->getPostersWithUrl($imageUrl, 1, 1)[0]) ? $tmdbVideo->getPostersWithUrl($imageUrl, 1, 1)[0] : asset('images/default.png');
                    $videoimages[1]->image = isset($tmdbVideo->getPostersWithUrl($imageUrl, 1, 2)[0]) ? $tmdbVideo->getPostersWithUrl($imageUrl, 1, 2)[0] : asset('images/default.png');
                }
            }

            $video_cast_crews = [];

            $cast_crews = CastCrew::select('id', 'name')->get();

            return view('admin.videos.upload_by_tmdb', compact('categories', 'model',
                'videoimages', 'cast_crews', 'tmdbVideo', 'genres'))
                ->with('page', 'videos')
                ->with('sub_page', 'admin_videos_create');

        } catch (\Exception $e) {
            Session::flash('error', Utility::errorMsg($e, 'TMDBVC: 001', $e->getMessage()));
            return redirect()->back();
        }
    }


    public function tmdbVideosSave(Request $request)
    {

        try {

            $tmdbVideo = $this->tmdbApi->getMovieDetails($request->tmdb_video_id);

            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255|min:4',
                'description' => 'required',
                'video' => $request->video_type == 1 ? 'required|max:255' : 'mimes:mp4',
                'default_image' => $tmdbVideo->hasData() ? '' : ($request->admin_video_id ? 'nullable|mimes:png,jpeg,jpg' : 'required|mimes:png,jpeg,jpg'),
                'other_image1' => $request->has('tmdb_video_id') ? '' : ($request->admin_video_id ? 'nullable|mimes:png,jpeg,jpg' : 'required|mimes:png,jpeg,jpg'),
                'other_image2' => $request->has('tmdb_video_id') ? '' : ($request->admin_video_id ? 'nullable|mimes:png,jpeg,jpg' : 'required|mimes:png,jpeg,jpg'),

            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error_messages' => implode('|', $validator->errors()->all()), 'error_code' => '502']);
            }


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
            $model->price = $request->price;
            $model->video_type = $request->video_type;

            if ($request->video_type == VIDEO_TYPE_UPLOAD) {
                $model->video = $request->video;
            }

            // Check for Youtube Link for Movie
            if ($request->video_type == VIDEO_TYPE_YOUTUBE) {

                $video = get_api_youtube_link($request->video);
                $model->video = $video;
            }

            if ($request->trailer_video_type == VIDEO_TYPE_UPLOAD) {
                $model->trailer_video = $request->trailer_video;
            }

            // Check for Youtube Link for Trailer
            if ($request->video_type == VIDEO_TYPE_YOUTUBE) {

                $trailer_video = get_api_youtube_link($request->trailer_video);
                $model->trailer_video = $trailer_video;
            }


            $model->default_image = '';
            $model->video_gif_image = '';
            $model->video_image_mobile = '';
            $model->banner_image = '';
            $model->is_banner = 0;
            $model->ppv_created_by = Auth::user()->id;
            $model->watch_count = 0;
            $model->is_pay_per_view = 0;
            $model->redeem_amount = 0;
            $model->admin_amount = 0;
            $model->user_amount = 0;
            $model->trailer_subtitle = '';
            $model->video_subtitle = '';

            $model->genre_id = $request->sub_category_id;

            $model->status = 1;
            $model->is_approved = 1;
            $model->is_home_slider = 0;
            $model->uploaded_by = Auth::user()->id;

            $model->publish_time = date('Y-m-d H:i:s');
            $model->duration = !empty($request->duration) ? date('H:i:s', strtotime($request->duration)) : '00:00:00';
            $model->trailer_duration = '00:00:00';
            $model->video_resolutions = null;
            $model->trailer_video_resolutions = null;
            $model->compress_status = 0;
            $model->main_video_compress_status = DO_NOT_COMPRESS;
            $model->trailer_compress_status = DO_NOT_COMPRESS;
            $model->video_resize_path = null;
            $model->trailer_resize_path = null;
            $model->edited_by = 'admin';
            $model->watch_count;
            $model->is_pay_per_view;
            $model->type_of_user = 0;
            $model->type_of_subscription = 0;
            $model->amount;
            $model->video_upload_type = VIDEO_UPLOAD_TYPE_DIRECT;
            $model->position = 1;


            if ($tmdbVideo->hasData()) {

                $imageUrl = $this->tmdbApi->getImageURL('w300');

                $model->trailer_video = 'https://www.youtube.com/embed/' . $tmdbVideo->getTrailer();
                $model->default_image = $imageUrl . $tmdbVideo->getPoster();
            }


            if ($request->hasFile('video')) {

                if ($request->admin_video_id) {

                    Helper::s3_delete_picture($model->video);
                }
                $main_video_details = Helper::video_upload($request->file('video'));
                $model->video = $main_video_details['db_url'];

            }

            if ($request->hasFile('trailer_video')) {

                if ($request->admin_video_id) {

                    Helper::s3_delete_picture($model->trailer_video);
                }
                $trailer_video_details = Helper::video_upload($request->file('trailer_video'));
                $model->trailer_video = $trailer_video_details['db_url'];

            }

            if ($request->hasFile('video_subtitle')) {

                if ($model->video_subtitle) {

                    Helper::delete_picture($model->video_subtitle, "/uploads/subtitles/");

                }
                $model->video_subtitle = Helper::subtitle_upload($request->file('video_subtitle'));
            }

            $model->save();

            $requestedCastCrew = array_map('intval', $request->cast_crew);
            $castCrew = CastCrew::whereIn('id', $requestedCastCrew)->get();
            if ($request->admin_video_id != '') {

                if($castCrew->isNotEmpty()) $model->videoCastCrew()->sync($castCrew);
            }else{
                if($castCrew->isNotEmpty()) $model->videoCastCrew()->attach($castCrew);
            }

            if ($tmdbVideo->hasData()) {

                AdminVideoImage::firstOrCreate(
                    ['admin_video_id' => $model->id],
                    [
                        'image' => isset($tmdbVideo->getPostersWithUrl($imageUrl, 1, 1)[0]) ? $tmdbVideo->getPostersWithUrl($imageUrl, 1, 2)[0] : asset('images/default.png'),
                        'is_default' => DEFAULT_FALSE,
                        'position' => 2,
                    ]
                );

                AdminVideoImage::firstOrCreate(
                    ['admin_video_id' => $model->id],
                    [
                        'image' => isset($tmdbVideo->getPostersWithUrl($imageUrl, 1, 2)[0]) ? $tmdbVideo->getPostersWithUrl($imageUrl, 1, 2)[0] : asset('images/default.png'),
                        'is_default' => DEFAULT_FALSE,
                        'position' => 2,
                    ]
                );
            }


            if ($request->hasFile('other_image1')) {

                Helper::upload_video_image($request->file('other_image1'), $model->id, $position = 2);

            }

            if ($request->hasFile('other_image2')) {

                Helper::upload_video_image($request->file('other_image2'), $model->id, $position = 3);

            }

            DB::commit();

            $response_array = ['success' => true, 'message' => tr('video_upload_success'), 'data' => (object)['id' => $model->id]];

            return response()->json($response_array);

        } catch (\Exception $e) {

            dd($e);
            DB::rollback();

            $response_array = ['success' => false, 'error_messages' => $e->getMessage(), 'error_code' => $e->getCode()];

            return response()->json($response_array);

        }
    }



    public function tmdbVideosEdit($id)
    {
        try {

            $model = AdminVideo::find($id);

            if($model){

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


                $videoimages = get_video_image($model->id);


                $video_cast_crews = [];

                $cast_crews = CastCrew::select('id', 'name')->get();

                return view('admin.videos.upload_by_tmdb', compact('categories', 'model',
                    'videoimages', 'cast_crews', 'genres'))
                    ->with('page', 'videos')
                    ->with('sub_page', 'admin_videos_create');
            }else{

                Session::flash('error', 'Sorry something went wrong [TMDBVC: 002]');
                return redirect()->back();

            }


        } catch (\Exception $e) {
            Session::flash('error', Utility::errorMsg($e, 'TMDBVC: 003', $e->getMessage()));
            return redirect()->back();
        }
    }

    // ------------------------------------------------------------------------------------------------
    // --------------------------------- OLD Functionality from AdminController -----------------------
    // ------------------------------------------------------------------------------------------------


    /**
     * Function Name : admin_videos_edit()
     *
     * @uses To display a upload video form
     *
     * @created: Shobana Chandrasekar
     *
     * @updated: -
     *
     * @param object $request - -
     *
     * @return response of html page with details
     */
    public function admin_videos_edit(Request $request)
    {

        $model = AdminVideo::where('admin_videos.id', $request->id)->first();

        if ($model) {

            $categories = Category::where('categories.is_approved', DEFAULT_TRUE)
                ->select('categories.id as id', 'categories.name', 'categories.picture',
                    'categories.is_series', 'categories.status', 'categories.is_approved')
                ->leftJoin('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
                ->groupBy('sub_categories.category_id')
                ->where('sub_categories.is_approved', SUB_CATEGORY_APPROVED)
                ->havingRaw("COUNT(sub_categories.id) > 0")
                ->orderBy('categories.name', 'asc')
                ->get();

            $sub_categories = SubCategory::where('category_id', '=', $model->category_id)
                ->leftJoin('sub_category_images', 'sub_categories.id', '=', 'sub_category_images.sub_category_id')
                ->select('sub_category_images.picture', 'sub_categories.*')
                ->where('sub_category_images.position', 1)
                ->where('is_approved', SUB_CATEGORY_APPROVED)
                ->orderBy('name', 'asc')
                ->get();

            $model->publish_time = $model->publish_time ? date('d-m-Y H:i:s', strtotime($model->publish_time)) : $model->publish_time;

            $videoimages = get_video_image($model->id);

            $model->video_resolutions = $model->video_resolutions ? explode(',', $model->video_resolutions) : [];

            $model->trailer_video_resolutions = $model->trailer_video_resolutions ? explode(',', $model->trailer_video_resolutions) : [];

            $video_cast_crews = VideoCastCrew::select('cast_crew_id')
                ->where('admin_video_id', $request->id)
                ->get()->pluck('cast_crew_id')->toArray();

            $cast_crews = CastCrew::select('id', 'name')->get();

            return view('admin.videos.upload')->with('page', 'videos')
                ->with('categories', $categories)
                ->with('model', $model)
                ->with('sub_categories', $sub_categories)
                ->with('sub_page', 'admin_videos_create')
                ->with('videoimages', $videoimages)
                ->with('cast_crews', $cast_crews)
                ->with('video_cast_crews', $video_cast_crews);


        } else {

            return back()->with('flash_error', tr('something_error'));

        }
    }


    /**
     * Function Name : admin_videos_save()
     *
     * @uses To save a new video as well as updated video details
     *
     * @created: Shobana Chandrasekar
     *
     * @updated:
     *
     * @param object $request - -
     *
     * @return response of success/failure page
     */
    public function admin_videos_save(Request $request)
    {

        // Call video save method of common function video repo

        $response = VideoRepo::video_save($request)->getData();

        return ['response' => $response];
    }


    public function view_video(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:admin_videos,id'
        ]);

        if ($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            return back()->with('flash_error', $error_messages);
        } else {
            $videos = AdminVideo::where('admin_videos.id', $request->id)
                ->leftJoin('categories', 'admin_videos.category_id', '=', 'categories.id')
                ->leftJoin('sub_categories', 'admin_videos.sub_category_id', '=', 'sub_categories.id')
                ->leftJoin('tmdb_genres', 'admin_videos.genre_id', '=', 'tmdb_genres.tmdb_genre_id')
                ->select('admin_videos.id as video_id', 'admin_videos.title',
                    'admin_videos.description', 'admin_videos.ratings',
                    'admin_videos.reviews', 'admin_videos.created_at as video_date',
                    'admin_videos.video', 'admin_videos.trailer_video',
                    'admin_videos.default_image', 'admin_videos.banner_image', 'admin_videos.is_banner', 'admin_videos.video_type',
                    'admin_videos.video_upload_type',
                    'admin_videos.amount',
                    'admin_videos.type_of_user',
                    'admin_videos.type_of_subscription',
                    'admin_videos.category_id as category_id',
                    'admin_videos.sub_category_id',
                    'admin_videos.genre_id',
                    'admin_videos.video_type',
                    'admin_videos.uploaded_by',
                    'admin_videos.ppv_created_by',
                    'admin_videos.details',
                    'admin_videos.watch_count',
                    'admin_videos.admin_amount',
                    'admin_videos.user_amount',
                    'admin_videos.video_upload_type',
                    'admin_videos.duration',
                    'admin_videos.redeem_amount',
                    'admin_videos.compress_status',
                    'admin_videos.trailer_compress_status',
                    'admin_videos.main_video_compress_status',
                    'admin_videos.video_resolutions',
                    'admin_videos.video_resize_path',
                    'admin_videos.trailer_resize_path',
                    'admin_videos.is_approved',
                    'admin_videos.unique_id',
                    'admin_videos.video_subtitle',
                    'admin_videos.trailer_subtitle',
                    'admin_videos.trailer_duration',
                    'admin_videos.trailer_video_resolutions',
                    'admin_videos.publish_time',
                    'categories.name as category_name', 'sub_categories.name as sub_category_name',
                    'tmdb_genres.name as genre_name',
                    'admin_videos.video_gif_image',
                    'admin_videos.is_banner',
                    'admin_videos.is_pay_per_view',
                    'admin_videos.age',
                    'admin_videos.status'
                )
                ->orderBy('admin_videos.created_at', 'desc')
                ->first();

            $videoPath = $video_pixels = $trailer_video_path = $trailer_pixels = $trailerstreamUrl = $videoStreamUrl = '';

            $ios_trailer_video = $videos->trailer_video;

            $ios_video = $videos->video;

            if ($videos->video_type == VIDEO_TYPE_UPLOAD && $videos->video_upload_type == VIDEO_UPLOAD_TYPE_DIRECT) {

                if (check_valid_url($videos->trailer_video)) {

                    if (Setting::get('streaming_url'))
                        $trailerstreamUrl = Setting::get('streaming_url') . get_video_end($videos->trailer_video);

                    if (Setting::get('HLS_STREAMING_URL'))
                        $ios_trailer_video = Setting::get('HLS_STREAMING_URL') . get_video_end($videos->trailer_video);
                }

                if (check_valid_url($videos->video)) {

                    if (Setting::get('streaming_url'))
                        $videoStreamUrl = Setting::get('streaming_url') . get_video_end($videos->video);

                    if (Setting::get('HLS_STREAMING_URL'))
                        $ios_video = Setting::get('HLS_STREAMING_URL') . get_video_end($videos->video);
                }


                if (\Setting::get('streaming_url')) {
                    if ($videos->is_approved == 1) {
                        if ($videos->trailer_video_resolutions) {
                            $trailerstreamUrl = Helper::web_url() . '/uploads/smil/' . get_video_end_smil($videos->trailer_video) . '.smil';
                        }
                        if ($videos->video_resolutions) {
                            $videoStreamUrl = Helper::web_url() . '/uploads/smil/' . get_video_end_smil($videos->video) . '.smil';
                        }
                    }
                } else {

                    $videoPath = $videos->video_resize_path ? $videos->video . ',' . $videos->video_resize_path : $videos->video;
                    $video_pixels = $videos->video_resolutions ? 'original,' . $videos->video_resolutions : 'original';
                    $trailer_video_path = $videos->trailer_resize_path ? $videos->trailer_video . ',' . $videos->trailer_resize_path : $videos->trailer_video;
                    $trailer_pixels = $videos->trailer_video_resolutions ? 'original,' . $videos->trailer_video_resolutions : 'original';
                }

                $trailerstreamUrl = $trailerstreamUrl ? $trailerstreamUrl : "";
                $videoStreamUrl = $videoStreamUrl ? $videoStreamUrl : "";
            } else {

                $trailerstreamUrl = $videos->trailer_video;

                $videoStreamUrl = $videos->video;

                if ($videos->video_type == VIDEO_TYPE_YOUTUBE) {

                    $videoStreamUrl = $ios_video = get_youtube_embed_link($videos->video);

                    $trailerstreamUrl = $ios_trailer_video = get_youtube_embed_link($videos->trailer_video);


                }
            }

            $admin_video_images = AdminVideoImage::where('admin_video_id', $request->id)
                ->orderBy('is_default', 'desc')
                ->get();

            $page = 'videos';

            $sub_page = 'admin_videos_view';

            if ($videos->is_banner == 1) {

                $sub_page = 'view-banner-videos';
            }

            // Load Video Cast & crews

            $video_cast_crews = VideoCastCrew::select('cast_crew_id', 'name')
                ->where('admin_video_id', $request->id)
                ->leftjoin('cast_crews', 'cast_crews.id', '=', 'video_cast_crews.cast_crew_id')
                ->get()->pluck('name')->toArray();

            return view('admin.videos.view-video')->with('video', $videos)
                ->with('video_images', $admin_video_images)
                ->withPage($page)
                ->with('sub_page', $sub_page)
                ->with('videoPath', $videoPath)
                ->with('video_pixels', $video_pixels)
                ->with('ios_trailer_video', $ios_trailer_video)
                ->with('ios_video', $ios_video)
                ->with('trailer_video_path', $trailer_video_path)
                ->with('trailer_pixels', $trailer_pixels)
                ->with('videoStreamUrl', $videoStreamUrl)
                ->with('trailerstreamUrl', $trailerstreamUrl)
                ->with('video_cast_crews', $video_cast_crews);
        }
    }


    /**
     * Function Name: videos()
     *
     * @uses: get the videos list
     *
     * @created vidhya R
     *
     * @edited Vidhya R
     *
     * @param Get the video list in table
     *
     * @return Videos list
     */

    public function videos(Request $request)
    {

        $query = AdminVideo::leftJoin('categories', 'admin_videos.category_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'admin_videos.sub_category_id', '=', 'sub_categories.id')
            ->leftJoin('tmdb_genres', 'admin_videos.genre_id', '=', 'tmdb_genres.tmdb_genre_id')
            ->leftJoin('users', 'admin_videos.uploaded_by', '=', 'users.id')
            ->select(
                'admin_videos.id as video_id',
                'admin_videos.title',
                'admin_videos.description',
                'admin_videos.ratings',
                'admin_videos.reviews',
                'admin_videos.created_at as video_date',
                'admin_videos.default_image',
                'admin_videos.banner_image',
                'admin_videos.amount',
                'admin_videos.admin_amount',
                'admin_videos.user_amount',
                'admin_videos.unique_id',
                'admin_videos.type_of_user',
                'admin_videos.type_of_subscription',
                'admin_videos.category_id as category_id',
                'admin_videos.sub_category_id',
                'admin_videos.genre_id',
                'admin_videos.uploaded_by',
                'admin_videos.is_home_slider',
                'admin_videos.watch_count',
                'admin_videos.compress_status',
                'admin_videos.trailer_compress_status',
                'admin_videos.main_video_compress_status',
                'admin_videos.status', 'admin_videos.uploaded_by',
                'admin_videos.edited_by', 'admin_videos.is_approved',
                'admin_videos.video_subtitle',
                'admin_videos.trailer_subtitle',
                'categories.name as category_name',
                'sub_categories.name as sub_category_name',
                'tmdb_genres.name as genre_name',
                'users.name as user_name',
                'admin_videos.is_banner',
                'admin_videos.position')
            ->orderBy('admin_videos.created_at', 'desc');

        if ($request->banner == BANNER_VIDEO) {

            $query->where('is_banner', BANNER_VIDEO);

            $sub_page = 'view-banner-videos';

        } else {

            $sub_page = 'view-videos';

        }

        $category = $sub_category = $genre = $moderator_details = "";

        if ($request->category_id) {

            $query->where('admin_videos.category_id', $request->category_id);

            $category = Category::find($request->category_id);

        }

        if ($request->sub_category_id) {

            $query->where('admin_videos.sub_category_id', $request->sub_category_id);

            $sub_category = SubCategory::find($request->sub_category_id);

        }

        if ($request->genre_id) {

            $query->where('admin_videos.genre_id', $request->genre_id);

            $genre = TmdbGenre::find($request->genre_id);

        }

        // Find User Information
        if ($request->uploaded_by) {

            $query->where('admin_videos.uploaded_by', $request->uploaded_by);

            $user = User::find($request->uploaded_by);

        }

        if ($request->moderator_id) {

            $query->where('admin_videos.uploaded_by', $request->moderator_id);

            $moderator_details = Moderator::find($request->moderator_id);

        }

        $videos = $query->paginate(10);

        return view('admin.videos.videos')->with('videos', $videos)
            ->withPage('videos')
            ->with('sub_page', $sub_page)
            ->with('category', $category)
            ->with('sub_category', $sub_category)
            ->with('genre', $genre)
//            ->with('user', $user)
            ->with('moderator_details', $moderator_details);
    }


    /**
     * Function Name : admin_videos_create()
     *
     * To display a upload video form
     *
     * @created_by - Shobana Chandrasekar
     *
     * @updated_by - -
     *
     * @param object $request - -
     *
     * @return response of html page with details
     */
    public function admin_videos_create(Request $request)
    {

        $categories = Category::where('categories.is_approved', DEFAULT_TRUE)
            ->select('categories.id as id', 'categories.name', 'categories.picture',
                'categories.is_series', 'categories.status', 'categories.is_approved')
            ->leftJoin('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
//            ->where("sub_categories.is_approved", SUB_CATEGORY_APPROVED)
//            ->havingRaw("COUNT(sub_categories.id) > 0")
//            ->orderBy('categories.name', 'asc')
//            ->groupBy('sub_categories.category_id')
            ->get();

        $model = new AdminVideo;

        $model->trailer_video_resolutions = [];

        $model->video_resolutions = [];

        $videoimages = [];

        $video_cast_crews = [];

        $cast_crews = CastCrew::select('id', 'name')->get();

        return view('admin.videos.upload')->with('page', 'videos')
            ->with('categories', $categories)
            ->with('sub_page', 'admin_videos_create')
            ->with('model', $model)
            ->with('videoimages', $videoimages)
            ->with('cast_crews', $cast_crews)
            ->with('video_cast_crews', $video_cast_crews);
    }

}
