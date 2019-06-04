<?php

namespace App\Http\Controllers;

use App\Model\CreditMoney;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class CreditMoneyController extends Controller
{
    /**
     * CreditMoneyController constructor.
     */
    public function __construct()
    {
        $this->middleware(['role:super-admin|admin']);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $creditmoney = CreditMoney::leftJoin('users as receiver', 'receiver.id', '=', 'credit_moneys.user_id')
            ->leftJoin('model_has_roles as receiver_has_role', 'receiver_has_role.model_id', '=', 'credit_moneys.user_id')
            ->leftJoin('roles as receiver_roles', 'receiver_roles.id', '=', 'receiver_has_role.role_id')
            ->leftJoin('users as giver', 'giver.id', '=', 'credit_moneys.given_by')
            ->get([
                'credit_moneys.*',
                'receiver.name as receiver_name',
                'giver.name as giver_name',
                'receiver_roles.name as receiver_role',
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
        $roles = Role::all();

        return view('admin.credit-money.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'amount' => 'required',
        ]);

        $creditMoney = new CreditMoney();

        $creditMoney->user_id = $request->user_id;
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
        $roles = Role::all();

        return view('admin.credit-money.edit', compact('creditmoney', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $creditmoney = CreditMoney::find($id);

        $this->validate($request, [
            'user_id' => 'required',
            'amount' => 'required',
        ]);

        $creditmoney->user_id = $request->user_id;
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


    public function getUserByRole(Request $request)
    {
        $data = [];

        try {

            if (!empty($request->role)) {

                $role = Role::findById($request->role);

                if (!empty($role)) {

                    $roleUsers = $role->users;

                    if ($roleUsers) {
                        $data = $roleUsers->pluck('name', 'id');
                    }
                }
            }

            return response()->json(['statusCode' => 1, 'data' => $data]);


        } catch (\Exception $e) {

            return response()->json(['statusCode' => 0, 'data' => [], 'message' => $e->getMessage()]);
        }
    }

}
