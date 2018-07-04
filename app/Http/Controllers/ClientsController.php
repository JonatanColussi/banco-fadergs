<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

/**
 * Class ClientsController
 * @package App\Http\Controllers
 */
class ClientsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $response['clients'] = Client::all();

        return view('client.index', $response);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert()
    {
        $response['client'] = new Client;
        $response['client']->person = 'Física';
        $response['client']->status = true;

        return view('client.form', $response);
    }

    /**
     * @param $client_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($client_id)
    {
        $response['client'] = Client::find($client_id);

        return view('client.form', $response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $client = Client::find($request->id) ?? new Client;

        $request->validate([
            'document' => 'required|unique:clients,document,'.$client->id,
        ]);

        $client->name = $request->name;
        $client->document = $request->document;
        $client->person = (strlen($client->document) > 14) ? 'Jurídica' : 'Física';
        $client->city = $request->city;
        $client->status = $request->status;

        $client->save();

        return redirect()->route('clients.edit', ['client_id' => $client->id])->with('status', 'Registro salvo com sucesso!');
    }
}
