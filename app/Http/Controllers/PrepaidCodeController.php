<?php

namespace App\Http\Controllers;

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
        $uniqueId = $this->generateUUI();
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
        $requestData = $request->all();
        
        PrepaidCode::create($requestData);


        return redirect()->route('admin/.prepaid-code.create')->with('success', 'PrepaidCode added!');
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
    public function update(Request $request, PrepaidCode $id)
    {
        $prepaidcode = PrepaidCode::find($id);
        $this->validate($request, [
			'retailer_id' => 'required',
			'amount' => 'required',
			'given_by' => 'required'
		]);
        $requestData = $request->all();
        
        $prepaidcode->update($requestData);

        return redirect()->route('admin/.prepaid-code.edit', $prepaidcode->id)->with('success', 'PrepaidCode updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $prepaidcode = PrepaidCode::find($id);
        $prepaidcode->delete();

        return ' Deleted successfully';

    }

    public function generateUUI($length = 10){
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($length / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $length);
    }
}
