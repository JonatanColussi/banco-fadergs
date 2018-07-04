<?php

namespace App\Http\Controllers;

use App\Account;
use App\Movement;
use App\MovementType;
use Illuminate\Http\Request;

/**
 * Class MovementsController
 * @package App\Http\Controllers
 */
class MovementsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $response['movements'] = Movement::all();

        return view('movement.index', $response);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert()
    {
        $response['movement'] = new Movement;
        $response['accounts'] = Account::all();
        $response['movement_types'] = MovementType::all();

        return view('movement.form', $response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $movement = new Movement;
        $date = new \DateTime();
        $movement->date = $date->format('Y-m-d');
        $movement->value = $request->value;
        $movement->account_id = $request->account_id;
        $movement->movement_type_id = $request->movement_type_id;

        if ($movement->save()) {
            $movement->account->updateLimit($movement);
        }

        return redirect()->route('movements.index')->with('status', 'Registro salvo com sucesso!');
    }


    /**
     * @param $account_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function extract($account_id)
    {
        $response['account'] = Account::find($account_id);

        return view('movement.extract', $response);
    }
}
