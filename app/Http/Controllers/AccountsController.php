<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountType;
use App\Agency;
use App\Client;
use Illuminate\Http\Request;

/**
 * Class AccountsController
 * @package App\Http\Controllers
 */
class AccountsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $response['accounts'] = Account::all();
        return view('account.index', $response);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert()
    {
        $response['account'] = new Account;
        $data = new \Datetime();
        $response['account']->limit = '0.00';
        $response['account']->start_date = $data->format('Y-m-d');
        $response['account_types'] = AccountType::all();
        $response['agencies'] = Agency::all();
        $response['clients'] = Client::where('status', true)->get();

        return view('account.form', $response);
    }

    /**
     * @param $account_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($account_id)
    {
        $response['account'] = Account::find($account_id) ?? new Account;
        $response['account_types'] = AccountType::all();
        $response['agencies'] = Agency::all();
        $response['clients'] = Client::where('status', true)->get();

        return view('account.form', $response);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $account = Account::find($request->id) ?? new Account;

        $account->agency_id = $request->agency_id;
        $account->client_id = $request->client_id;
        $account->limit = $request->limit;
        $account->start_date = $request->start_date;
        $account->account_type_id = $request->account_type_id;

        $account->save();

        return redirect()->route('accounts.edit', ['account_id' => $account->id])->with('status', 'Registro salvo com sucesso!');
    }
}
