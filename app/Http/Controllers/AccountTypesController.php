<?php

namespace App\Http\Controllers;

use App\AccountType;
use Illuminate\Http\Request;

/**
 * Class AccountTypesController
 * @package App\Http\Controllers
 */
class AccountTypesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $response['account_types'] = AccountType::all();

        return view('account_type.index', $response);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert()
    {
        $response['account_type'] = new AccountType;

        return view('account_type.form', $response);
    }

    /**
     * @param $movement_type_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($movement_type_id)
    {
        $response['account_type'] = AccountType::find($movement_type_id);

        return view('account_type.form', $response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $account_type = AccountType::find($request->id) ?? new AccountType;

        $account_type->description = $request->description;
        $account_type->class = $request->class;

        $account_type->save();

        return redirect()->route('account_types.edit', ['movement_type_id' => $account_type->id])->with('status', 'Registro salvo com sucesso!');

    }

    /**
     * @param $account_type_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($account_type_id)
    {
        if ($account_type = AccountType::find($account_type_id)) {
            $account_type->delete();
        }

        return redirect()->route('account_types.index')->with('status', 'Registro deletado com sucesso!');
    }
}
