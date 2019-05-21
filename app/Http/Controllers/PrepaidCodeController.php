<?php

namespace App\Http\Controllers;

use App\Libraries\Utility;
use App\Model\PrepaidCode;
use Illuminate\Http\Request;

class PrepaidCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
       $prepaidcode = PrepaidCode::all();

       return view('admin.prepaid-code.index', compact('prepaidcode'));
    }

    public function indexJson()
    {

        return response()->json(['data' => PrepaidCode::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $uniqueId = $uniqueId = Utility::generateUUI();;
        return view('admin.prepaid-code.create', compact('uniqueId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'code' => 'required',
			'price' => 'required',
		]);

        $prepaidCode = new PrepaidCode();

        $prepaidCode->price = $request->price;
        $prepaidCode->code = $request->code;
        $prepaidCode->is_used = 0;
        $prepaidCode->is_paid = 0;
        $prepaidCode->save();

        return redirect()->route('admin.prepaid-code.create')->with('success', 'Prepaid Code added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prepaidcode = PrepaidCode::find($id);
        return view('admin.prepaid-code.edit', compact('prepaidcode'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $prepaidCode = PrepaidCode::find($id);

        $this->validate($request, [
            'price' => 'required',
            'is_used' => 'required',
        ]);

        $prepaidCode->price = $request->price;
        $prepaidCode->is_used = $request->is_used;
        $prepaidCode->save();

        return redirect()->route('admin.prepaid-code.edit', $prepaidCode->id)->with('success', 'Prepaid Code updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $prepaidcode = PrepaidCode::find($id);
        $prepaidcode->delete();

        return redirect()->route('admin.prepaid-code.index')->with('success', 'Prepaid Code Deleted successfully !');

    }


}
