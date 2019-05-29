<?php

namespace App\Http\Controllers;

use App\GeneratedGiftCard;
use App\Libraries\Utility;
use App\Model\GiftCard;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class GeneratedGiftCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $generateGiftCard = GeneratedGiftCard::
        leftJoin('gift_cards', 'generated_gift_cards.gift_card_id', '=', 'gift_cards.id')
            ->leftJoin('users as receiver', 'generated_gift_cards.customer_id', '=', 'receiver.id')
            ->leftJoin('users as giver', 'giver.id', '=', 'generated_gift_cards.created_by')
            ->get([
                'generated_gift_cards.id',
                'generated_gift_cards.UUID as UUID',
                'generated_gift_cards.is_paid as is_paid',
                'gift_cards.id',
                'gift_cards.code as title',
                'receiver.id as receiver_id',
                'receiver.name as receiver_name',
                'giver.id as giver_id',
                'giver.name as giver_name'
            ]);

        return view('admin.generate-gift-card.index', compact('generateGiftCard'));
    }

    public function indexJson()
    {

        return response()->json(['data' => GeneratedGiftCard::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $giftCards = GiftCard::all();
        $customers = User::role('customer')->get();

        return view('admin.generate-gift-card.create', compact('giftCards', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gift_card_id' => 'required',
            'customer_id' => 'required',
        ]);

        $generateGiftCard = new GeneratedGiftCard();

        $generateGiftCard->gift_card_id = $request->gift_card_id;
        $generateGiftCard->customer_id = $request->customer_id;
        $generateGiftCard->uuid = Utility::generateUUI();
        $generateGiftCard->sold_by = Auth::user()->id;
        $generateGiftCard->is_paid = 0;
        $generateGiftCard->is_deleted = 0;

        $generateGiftCard->save();

        return redirect()->route('admin.generate-gift-card.create')->with('success', 'GenerateGiftCard added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GeneratedGiftCard  $generatedGiftCard
     * @return Response
     */
    public function show($id)
    {
        $generateGiftCard = GeneratedGiftCard::find($id);
        return view('admin.generate-gift-card.show', compact('generateGiftCard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GeneratedGiftCard  $generatedGiftCard
     * @return Response
     */
    public function edit($id)
    {
        $generateGiftCard = GeneratedGiftCard::find($id);
        $giftCards = GiftCard::find($generateGiftCard->gift_card_id);
        $customers = User::find($generateGiftCard->customer_id);

        return view('admin.generate-gift-card.edit', compact('generateGiftCard', 'giftCards', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, GeneratedGiftCard $id)
    {
        $generateGiftCard = GeneratedGiftCard::find($id);
        $this->validate($request, [
            'gift_card_id' => 'required|max:10',
            'customer_id' => 'required|max:10',
            'sold_by' => 'required|max:10'
        ]);

        $requestData = $request->all();

        $generateGiftCard->update($requestData);

        return redirect()->route('admin.generate-gift-card.edit', $generateGiftCard->id)->with('success', 'GeneratePrepaidCode updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $generateGiftCard = GeneratedGiftCard::find($id);
        $generateGiftCard->delete();

        return redirect()->route('admin.generate-gift-card.index')->with('success', 'Deleted successfully');
    }


    public function generateUuid()
    {

        return [
            'statusCode' => 1,
            'uuid' => Utility::generateUUI(),
        ];
    }
}
