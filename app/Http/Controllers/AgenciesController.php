<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;

/**
 * Class AgenciesController
 * @package App\Http\Controllers
 */
class AgenciesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $response['agencies'] = Agency::all();

        return view('agency.index', $response);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert()
    {
        $response['agency'] = new Agency;

        return view('agency.form', $response);
    }

    /**
     * @param $agency_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($agency_id)
    {
        $response['agency'] = Agency::find($agency_id);

        return view('agency.form', $response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $agency = Agency::find($request->id) ?? new Agency;

        $agency->name = $request->name;
        $agency->city = $request->city;

        $agency->save();

        return redirect()->route('agencies.edit', ['agency_id' => $agency->id])->with('status', 'Registro salvo com sucesso!');
    }
}
