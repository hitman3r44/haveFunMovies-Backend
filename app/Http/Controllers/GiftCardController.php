<?php

namespace App\Http\Controllers;

use App\Model\GiftCard;
use Illuminate\Http\Request;

class GiftCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
       $giftcard = GiftCard::all();

       return view('admin.gift-card.index', compact('giftcard'));
    }

    public function indexJson()
    {

        return response()->json(['data' => GiftCard::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $uniqueId = $this->generateUUI();
        return view('admin.gift-card.create', compact('uniqueId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'price' => 'required',
			'code' => 'required'
		]);
        $requestData = $request->all();
        
        GiftCard::create($requestData);


        return redirect()->route('admin/.gift-card.create')->with('success', 'GiftCard added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $giftcard = GiftCard::find($id);
        return view('admin.gift-card.edit', compact('giftcard'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, GiftCard $id)
    {
        $giftcard = GiftCard::find($id);
        $this->validate($request, [
			'price' => 'required',
			'code' => 'required'
		]);
        $requestData = $request->all();
        
        $giftcard->update($requestData);

        return redirect()->route('admin/.gift-card.edit', $giftcard->id)->with('success', 'GiftCard updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $giftcard = GiftCard::find($id);
        $giftcard->delete();

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
