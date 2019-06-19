<?php

namespace App\Http\Controllers;

use App\Model\CastAndCrewType;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class CastAndCrewTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CastAndCrewType  $castAndCrewType
     * @return \Illuminate\Http\Response
     */
    public function show(CastAndCrewType $castAndCrewType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CastAndCrewType  $castAndCrewType
     * @return \Illuminate\Http\Response
     */
    public function edit(CastAndCrewType $castAndCrewType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CastAndCrewType  $castAndCrewType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CastAndCrewType $castAndCrewType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CastAndCrewType  $castAndCrewType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CastAndCrewType $castAndCrewType)
    {
        //
    }

    /**
     * /**
     * Function Name: advertisement_get_data()
     *
     * Description: Get the additional data for advertisement
     *
     * @created hitman3r44
     *
     * @edited hitman3r44
     *
     * @param Request $request content type
     *
     * @return json
     */
    public function cast_and_crew_types_get_data(Request $request)
    {
        try {
            $contentType = $request->get('content');

            if ($contentType === 'cast-and-crews-types') {

                $cast_and_crew_types = CastAndCrewType::all();

//                dd($cast_and_crew_types);

                if ($cast_and_crew_types) {

                    $data = $cast_and_crew_types->pluck('title', 'id');
                }
            }

            return response()->json(['statusCode' => 1, 'data' => $data]);

        } catch (\Exception $e) {

            return response()->json(['statusCode' => 0, 'data' => [], 'message' => $e->getMessage()]);
        }
    }
}
