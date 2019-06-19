<?php

namespace App\Http\Controllers;

use App\Model\TmdbGenre;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GenreController extends Controller{

    /**
     * Function Name: genre_create()
     *
     * Description: Get the genre add form fields
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Get the route of add genre form
     *
     * @return Html form page
     */
    public function genre_create()
    {

        return view('admin.tmdb-genre.create')
            ->with('page', 'genres')
            ->with('sub_page', 'create');
    }

    /**
     * Function Name: genre_save()
     *
     * Description: Save/Update the genre details in database
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Request to all the genre details
     *
     * @return add details for success message
     */
    public function genre_save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {

            $error_messages = implode(',', $validator->messages()->all());

            return back()->with('flash_error', $error_messages);
        }

        if ($request->id != '') {

            $genre_detail = TmdbGenre::find($request->id);

            $genre_detail->updated_by = Auth::user()->id;

            $message = tr('genre_update_success');

        } else {

            $genre_detail = new TmdbGenre();

            $genre_detail->status = DEFAULT_TRUE;
            $genre_detail->created_by = Auth::user()->id;
            $genre_detail->updated_by = Auth::user()->id;

            $message = tr('genre_add_success');
        }

        $genre_detail->name = ucfirst($request->title);

        $genre_detail->description = $request->has('description') ? $request->description : '';


        if ($genre_detail) {

            $genre_detail->save();

            return back()->with('flash_success', $message);

        } else {

            return back()->with('flash_error', tr('genre_not_found_error'));
        }
    }

    /**
     * Function Name: genre_index()
     *
     * Description: Get the genre details for all
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Get the genre list in table
     *
     * @return Html table from genre list page
     */
    public function genre_index()
    {

        $genres = TmdbGenre::orderBy('updated_at', 'desc')->paginate(10);

        if ($genres) {

            return view('admin.tmdb-genre.index')
                ->with('genres', $genres)
                ->with('page', 'genres')
                ->with('sub_page', 'view_genres');
        } else {

            return back()->with('flash_error', tr('genre_not_found_error'));
        }
    }

    /**
     * Function Name: genre_edit()
     *
     * Description: Edit the genre details and get the genre edit form for
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param genre id
     *
     * @return Get the html form
     */
    public function genre_edit($id)
    {

        if ($id) {

            $edit_genre = TmdbGenre::find($id);

            if ($edit_genre) {

                return view('admin.tmdb-genre.edit')
                    ->with('edit_genre', $edit_genre)
                    ->with('page', 'genres')
                    ->with('sub_page', 'edit_genres');

            } else {
                return back()->with('flash_error', tr('genre_not_found_error'));
            }
        } else {

            return back()->with('flash_error', tr('genre_id_not_found_error'));
        }
    }

    /**
     * Function Name: genre_delete()
     *
     * Description: Delete the particular genre detail
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param genre id
     *
     * @return Deleted Success message
     */
    public function genre_delete($id)
    {

        if ($id) {

            $delete_genre = TmdbGenre::find($id);

            if ($delete_genre) {

                $delete_genre->delete();

                return back()->with('flash_success', tr('genre_delete_success'));
            } else {

                return back()->with('flash_error', tr('genre_not_found_error'));
            }

        } else {

            return back()->with('flash_error', tr('genre_id_not_found_error'));
        }
    }

    /**
     * Function Name: genre_status_change()
     *
     * Description: genre status for active and inactive update the status function
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Request the genre id
     *
     * @return Success message for active/inactive
     */
    public function genre_status_change(Request $request)
    {

        $genre_status = TmdbGenre::find($request->id);

        if ($genre_status) {

            $genre_status->status = $request->status;

            $genre_status->save();

        } else {

            return back()->with('flash_error', tr('genre_not_found_error'));
        }

        if ($request->status == DEFAULT_FALSE) {

            $message = tr('genre_decline_success');

        } else {

            $message = tr('genre_approve_success');
        }
        return back()->with('flash_success', $message);
    }

    /**
     * Function Name: genre_view()
     *
     * Description: Get the particular genre details for view page content
     *
     * @created hitman3r44
     *
     * @edited Maheswaari
     *
     * @param genre id
     *
     * @return Html view page with genre detail
     */
    public function genre_view($id)
    {

        if ($id) {

            $view_genre = TmdbGenre::find($id);

            if ($view_genre) {

                return view('admin.tmdb-genre.view')
                    ->with('view_genre', $view_genre)
                    ->with('page', 'genres')
                    ->with('sub_page', 'view_genres');
            }

        } else {

            return back()->with('flash_error', tr('genre_id_not_found_error'));
        }
    }
}
