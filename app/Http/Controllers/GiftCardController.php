<?php

namespace App\Http\Controllers;

use App\Libraries\Utility;
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
        $uniqueId = Utility::generateUUI();
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
        $giftData = new GiftCard();

        $giftData->price = $request->price;
        $giftData->code = $request->code;
        $giftData->is_used = 0;
        $giftData->is_paid = 0;
        $giftData->save();

        return redirect()->route('admin.gift-card.create')->with('success', 'Gift Card added!');
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
    public function update(Request $request, $id)
    {
        $giftcard = GiftCard::find($id);

        $this->validate($request, [
            'price' => 'required',
            'is_used' => 'required',
        ]);

        $giftcard->price = $request->price;
        $giftcard->is_used = $request->is_used;
        $giftcard->save();

        return redirect()->route('admin.gift-card.edit', $giftcard->id)->with('success', 'Gift Card updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $giftcard = GiftCard::find($id);
        $giftcard->delete();

        return redirect()->route('admin.gift-card.index')->with('success', 'Gift Card Deleted!');

    }

}
