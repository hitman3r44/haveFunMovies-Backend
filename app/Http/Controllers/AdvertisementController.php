<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Model\AdminVideo;
use App\Model\Advertisement;
use App\Model\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertisementController extends Controller
{

    /**
     * Function Name: advertisement_create()
     *
     * Description: Get the advertisement add form fields
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Get the route of add advertisement form
     *
     * @return Html form page
     */
    public function advertisement_create()
    {
        return view('admin.advertisement.create')
            ->with('page', 'advertisements')
            ->with('sub_page', 'create');
    }

    /**
     * Function Name: advertisement_save()
     *
     * Description: Save/Update the advertisement details in database
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Request to all the advertisement details
     *
     * @return add details for success message
     */
    public function advertisement_save(Request $request)
    {
        try {

            $request->validate([
                'title' => 'required',
                'total_amount' => 'required|numeric|min:1|max:5000',
                'per_view_cost' => 'required|numeric',
                'countries' => 'required',
                'movies' => 'required',
            ]);

            $requestedCountries = array_map('intval', $request->countries);
            $countries = Country::whereIn('id', $requestedCountries)->get();

            $requestedMovies = array_map('intval', $request->movies);
            $movies = AdminVideo::whereIn('id', $requestedMovies)->get();

            DB::beginTransaction();

            if ($request->application_id != '') {

                $advertisement = Advertisement::find($request->application_id);

                $advertisement->updated_at = Carbon::now();
                $advertisement->updated_by = Auth::user()->id;

                $message = tr('advertisement_update_success');


            } else {

                $advertisement = new Advertisement;

                $advertisement->status = DEFAULT_TRUE;
                $advertisement->is_published = DEFAULT_FALSE;
                $advertisement->is_deleted = DEFAULT_FALSE;
                $advertisement->is_expired = DEFAULT_FALSE;
                $advertisement->already_played_time = 0;

                $advertisement->updated_at = Carbon::now();
                $advertisement->uploaded_at = Carbon::now();
                $advertisement->updated_by = Auth::user()->id;

                $message = tr('advertisement_add_success');
            }


            // Put requered fields into the model
            $advertisement->title = ucfirst($request->title);
            $advertisement->total_amount = $request->total_amount;
            $advertisement->per_view_cost = $request->per_view_cost;

            // Convert date format year,month,date purpose of database storing
            $advertisement->start_playing_date = !empty($request->start_playing_date) ? date('Y-m-d', strtotime($request->start_playing_date)) : null;
            $advertisement->end_playing_date = !empty($request->end_playing_date) ? date('Y-m-d', strtotime($request->end_playing_date)) : null;

            // Check Other Fields for null
            $advertisement->min_play_time = !empty($request->min_play_time) ? $request->min_play_time : 0;
            $advertisement->max_play_time = !empty($request->max_play_time) ? $request->max_play_time : 0;
            $advertisement->description = $request->description;

            $advertisement->video = '';
            if ($request->hasFile('video')) {

                if ($request->application_id != '') {
                    Helper::delete_picture($advertisement->video, '/uploads/videos/original/');
                }
                $advertisementVideo = Helper::video_upload($request->file('video'));
                $advertisement->video = $advertisementVideo['db_url'];
            }

            if ($advertisement->save()) {

                if ($request->application_id != '') { // edit

                    if($countries->isNotEmpty()) $advertisement->countries()->sync($countries);

                    if($movies->isNotEmpty()) $advertisement->movies()->sync($movies);

                }else{

                    if($countries->isNotEmpty()) $advertisement->countries()->attach($countries);

                    if($movies->isNotEmpty()) $advertisement->movies()->attach($movies);

                }

                DB::commit();

                return back()->with('flash_success', $message);

            } else {

                DB::rollback();
                return back()->with('flash_error', tr('advertisement_not_found_error'));
            }

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('flash_error', $e->getMessage().$e->getFile().' Code :[ADV:0001-'.$e->getLine().']')->withInput();
        }
    }

    /**
     * Function Name: advertisement_index()
     *
     * Description: Get the advertisement details for all
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Get the advertisement list in table
     *
     * @return Html table from advertisement list page
     */
    public function advertisement_index()
    {

        $advertisements = Advertisement::orderBy('created_at', 'desc')->get();

        if ($advertisements) {

            return view('admin.advertisement.index')
                ->with('advertisements', $advertisements)
                ->with('page', 'advertisements')
                ->with('sub_page', 'view_advertisements');
        } else {

            return back()->with('flash_error', tr('advertisement_not_found_error'));
        }
    }

    /**
     * Function Name: advertisement_edit()
     *
     * Description: Edit the advertisement details and get the advertisement edit form for
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Advertisement id
     *
     * @return Get the html form
     */
    public function advertisement_edit($id)
    {

        if ($id) {

            $edit_advertisement = Advertisement::find($id);
            if ($edit_advertisement) {

                return view('admin.advertisement.edit')
                    ->with('edit_advertisement', $edit_advertisement)
                    ->with('page', 'advertisements')
                    ->with('sub_page', 'edit_advertisements');

            } else {
                return back()->with('flash_error', tr('advertisement_not_found_error'));
            }
        } else {

            return back()->with('flash_error', tr('advertisement_id_not_found_error'));
        }
    }

    /**
     * Function Name: advertisement_delete()
     *
     * Description: Delete the particular advertisement detail
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Advertisement id
     *
     * @return Deleted Success message
     */
    public function advertisement_delete($id)
    {

        if ($id) {

            $delete_advertisement = Advertisement::find($id);

            if ($delete_advertisement) {

                $delete_advertisement->delete();

                return back()->with('flash_success', tr('advertisement_delete_success'));
            } else {

                return back()->with('flash_error', tr('advertisement_not_found_error'));
            }

        } else {

            return back()->with('flash_error', tr('advertisement_id_not_found_error'));
        }
    }

    /**
     * Function Name: advertisement_status_change()
     *
     * Description: Advertisement status for active and inactive update the status function
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Request the advertisement id
     *
     * @return Success message for active/inactive
     */
    public function advertisement_status_change(Request $request)
    {

        $advertisement_status = Advertisement::find($request->id);

        if ($advertisement_status) {

            if ($request->is_expired) {
                $advertisement_status->is_expired = $request->is_expired;
            }

            if ($request->is_published) {
                $advertisement_status->is_published = $request->is_published;
            }

            $advertisement_status->save();

        } else {

            return back()->with('flash_error', tr('advertisement_not_found_error'));
        }

        if ($request->is_published == DEFAULT_FALSE) {

            $message = tr('advertisement_decline_success');

        } else {

            $message = tr('advertisement_approve_success');
        }

        if ($request->is_expired == DEFAULT_FALSE) {

            $message = tr('advertisement_decline_success');

        } else {

            $message = tr('advertisement_approve_success');
        }

        return back()->with('flash_success', $message);
    }

    /**
     * Function Name: advertisement_view()
     *
     * Description: Get the particular advertisement details for view page content
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Advertisement id
     *
     * @return Html view page with advertisement detail
     */
    public function advertisement_view($id)
    {

        if ($id) {

            $view_advertisement = Advertisement::find($id);

            if ($view_advertisement) {

//                $user_advertisement = UserAdvertisement::where('advertisement_code', $view_advertisement->advertisement_code)->sum('no_of_times_used');

                return view('admin.advertisement.view')
                    ->with('view_advertisement', $view_advertisement)
                    ->with('page', 'advertisements')
//                    ->with('user_advertisement', $user_advertisement)
                    ->with('sub_page', 'view_advertisements');
            }

        } else {

            return back()->with('flash_error', tr('advertisement_id_not_found_error'));
        }
    }


    /**
     * /**
     * Function Name: advertisement_get_data()
     *
     * Description: Get the additional data for advertisement
     *
     * @created mehedi
     *
     * @edited mehedi
     *
     * @param Request $request content type
     *
     * @return json
     */
    public function advertisement_get_data(Request $request)
    {
        try {
            $contentType = $request->get('content');

            if ($contentType == 'countries') {

                $countries = Country::all();

                if ($countries) {

                    $data = $countries->pluck('name', 'id');
                }
            } else if ($contentType == 'movies') {

                $movies = AdminVideo::all();

                if ($movies) {

                    $data = $movies->pluck('title', 'id');
                }
            }

            return response()->json(['statusCode' => 1, 'data' => $data]);

        } catch (\Exception $e) {

            return response()->json(['statusCode' => 0, 'data' => [], 'message' => $e->getMessage()]);
        }
    }
}
