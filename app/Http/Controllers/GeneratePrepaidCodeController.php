<?php

namespace App\Http\Controllers;

use App\Libraries\Utility;
use App\Model\GeneratePrepaidCode;
use App\Model\PrepaidCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneratePrepaidCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $generatePrepaidCode = GeneratePrepaidCode::
        leftJoin('prepaid_codes', 'generate_prepaid_codes.prepaid_plan_id', '=', 'prepaid_codes.id')
            ->leftJoin('users as receiver', 'generate_prepaid_codes.customer_id', '=', 'receiver.id')
            ->leftJoin('users as giver', 'giver.id', '=', 'generate_prepaid_codes.created_by')
            ->get([
                'generate_prepaid_codes.id',
                'generate_prepaid_codes.UUID as UUID',
                'generate_prepaid_codes.is_paid as is_paid',
                'prepaid_codes.id',
                'prepaid_codes.title as title',
                'receiver.id as receiver_id',
                'receiver.name as receiver_name',
                'giver.id as giver_id',
                'giver.name as giver_name'
            ]);

        return view('admin.generate-prepaid-code.index', compact('generatePrepaidCode'));
    }

    public function indexJson()
    {

        return response()->json(['data' => GeneratePrepaidCode::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $prepaidCodes = PrepaidCode::all();
        $customers = User::role('customer')->get();

        return view('admin.generate-prepaid-code.create', compact('prepaidCodes', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'prepaid_plan_id' => 'required',
            'customer_id' => 'required',
        ]);

        $generatePrepaidCode = new GeneratePrepaidCode();

        $generatePrepaidCode->prepaid_plan_id = $request->prepaid_plan_id;
        $generatePrepaidCode->customer_id = $request->customer_id;
        $generatePrepaidCode->uuid = $request->uuid;
        $generatePrepaidCode->sold_by = Auth::user()->id;
        $generatePrepaidCode->is_paid = 0;
        $generatePrepaidCode->is_deleted = 0;

        $generatePrepaidCode->save();

        return redirect()->route('admin.generate-prepaid-code.create')->with('success', 'GeneratePrepaidCode added!');
    }

    /**
     * Show the the specified resource.
     */
    public function show($id)
    {
        $generatePrepaidCode = GeneratePrepaidCode::find($id);
        return view('admin.generate-prepaid-code.show', compact('generatePrepaidCode'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $generatePrepaidCode = GeneratePrepaidCode::find($id);
        $prepaidCodes = PrepaidCode::find($generatePrepaidCode->prepaid_plan_id);
        $customers = User::find($generatePrepaidCode->customer_id);

        return view('admin.generate-prepaid-code.edit', compact('generatePrepaidCode', 'prepaidCodes', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, GeneratePrepaidCode $id)
    {
        $generatePrepaidCode = GeneratePrepaidCode::find($id);
        $this->validate($request, [
            'prepaid_plan_id' => 'required|max:10',
            'customer_id' => 'required|max:10',
            'sold_by' => 'required|max:10'
        ]);
        $requestData = $request->all();

        $generatePrepaidCode->update($requestData);

        return redirect()->route('admin.generate-prepaid-code.edit', $generatePrepaidCode->id)->with('success', 'GeneratePrepaidCode updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $generatePrepaidCode = GeneratePrepaidCode::find($id);
        $generatePrepaidCode->delete();

        return redirect()->route('admin.generate-prepaid-code.index')->with('success', 'Deleted successfully');
    }


    public function generateUuid()
    {

        return [
            'statusCode' => 1,
            'uuid' => Utility::generateUUI(),
        ];
    }


}
