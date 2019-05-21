<?php

namespace App\Http\Controllers;

use App\Model\CreditMoney;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $creditmoney = CreditMoney::leftJoin('users as receiver', 'receiver.id', '=', 'credit_moneys.retailer_id')
            ->leftJoin('users as giver', 'giver.id', '=', 'credit_moneys.given_by')
            ->get([
                'credit_moneys.*',
                'receiver.name as receiver_name',
                'giver.name as giver_name',
                ]);
        return view('admin.credit-money.index', compact('creditmoney'));
    }

    public function indexJson()
    {

        return response()->json(['data' => CreditMoney::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $retailers = [];

        if (User::role('retailer')) {

            $retailers = User::role('retailer')->get(['id', 'name']);
        }

        return view('admin.credit-money.create', compact('retailers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'retailer_id' => 'required',
            'amount' => 'required',
        ]);

        $creditMoney = new CreditMoney();

        $creditMoney->retailer_id = $request->retailer_id;
        $creditMoney->amount = $request->amount;
        $creditMoney->given_by = Auth::user()->id;
        $creditMoney->save();
        return redirect()->route('admin.credit-money.create')->with('flash_success', 'Credit Money added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $creditmoney = CreditMoney::find($id);
        $retailers = [];

        if (User::role('retailer')) {

            $retailers = User::role('retailer')->get(['id', 'name']);
        }

        return view('admin.credit-money.edit', compact('creditmoney', 'retailers'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $creditmoney = CreditMoney::find($id);

        $this->validate($request, [
            'retailer_id' => 'required',
            'amount' => 'required',
        ]);

        $creditmoney->retailer_id = $request->retailer_id;
        $creditmoney->amount = $request->amount;
        $creditmoney->save();

        return redirect()->route('admin.credit-money.edit', $creditmoney->id)->with('flash_success', 'Credit Money updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $creditmoney = CreditMoney::find($id);
        $creditmoney->delete();

        return redirect()->route('admin.credit-money.index')->with('flash_success', 'Deleted successfully');

    }
}
