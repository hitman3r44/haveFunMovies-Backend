<?php

namespace App\Http\Controllers;

use App\Model\Advertisement;
use Illuminate\Http\Request;

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

        $validator = Validator::make($request->all(), [
            'id' => 'exists:advertisements,id',
            'title' => 'required',
            'total_amount'=>'required|numeric|min:1|max:5000',
            'per_view_cost'=>'required|numeric',
        ]);

        if ($validator->fails()) {

            $error_messages = implode(',', $validator->messages()->all());

            return back()->with('flash_error', $error_messages);
        }

        if ($request->id != '') {

            $advertisement_detail = Advertisement::find($request->id);

            $advertisement_detail->updated_at = Carbon::now();

            $message = tr('advertisement_update_success');

        } else {

            $advertisement_detail = new Advertisement;

            $advertisement_detail->status = DEFAULT_TRUE;
            $advertisement_detail->is_published = DEFAULT_FALSE;
            $advertisement_detail->is_deleted = DEFAULT_FALSE;
            $advertisement_detail->is_expired = DEFAULT_FALSE;
            $advertisement_detail->already_played_time = 0;

            $advertisement_detail->updated_at = Carbon::now();
            $advertisement_detail->uploaded_at = Carbon::now();
            $advertisement_detail->created_by = $request->created_by;

            $message = tr('advertisement_add_success');
        }

        // Put requered fields into the model
        $advertisement_detail->title = ucfirst($request->title);
        $advertisement_detail->total_amount = $request->total_amount;
        $advertisement_detail->per_view_cost = $request->per_view_cost ;

        // Convert date format year,month,date purpose of database storing
        $advertisement_detail->start_playing_date = $request->has('start_playing_date ') ? date('Y-m-d', strtotime($request->start_playing_date)) : null;
        $advertisement_detail->end_playing_date = $request->has('end_playing_date ') ? date('Y-m-d', strtotime($request->end_playing_date)) : null;
        $advertisement_detail->uploaded_at = date('Y-m-d', strtotime($advertisement_detail->uploaded_at));
        $advertisement_detail->updated_at = date('Y-m-d', strtotime($advertisement_detail->updated_at));

        // Check Other Fields for null
        $advertisement_detail->min_play_time = $request->has('min_play_time') ? $request->min_play_time : 0;
        $advertisement_detail->max_play_time = $request->has('max_play_time') ? $request->max_play_time : 0;
        $advertisement_detail->description = $request->has('description') ? $request->description : '';

        if ($advertisement_detail) {

            $advertisement_detail->save();

            return back()->with('flash_success', $message);

        } else {

            return back()->with('flash_error', tr('advertisement_not_found_error'));
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

        $advertisements = Advertisement::orderBy('updated_at', 'desc')->paginate(10);

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

            if($request->is_expired) {
                $advertisement_status->is_expired = $request->is_expired;
            }

            if($request->is_published) {
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
}
