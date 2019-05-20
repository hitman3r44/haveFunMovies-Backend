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
        $creditmoney = CreditMoney::all();
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
        $retailers = User::role('retailer')->get(['id','name']);
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
            'given_by' => 'required'
        ]);
        $requestData = $request->all();

        CreditMoney::create($requestData);

        return redirect()->route('admin.credit-money.create')->with('flash_success', 'CreditMoney added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $creditmoney = CreditMoney::find($id);
        $retailers = User::role('retailer')->get(['id','name']);

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
            'given_by' => 'required'
        ]);
        $requestData = $request->all();

        $creditmoney->update($requestData);

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
