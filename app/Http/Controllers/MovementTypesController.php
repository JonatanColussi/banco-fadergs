<?php

namespace App\Http\Controllers;

use App\MovementType;
use Illuminate\Http\Request;

/**
 * Class MovementTypesController
 * @package App\Http\Controllers
 */
class MovementTypesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $response['movement_types'] = MovementType::all();

        return view('movement_type.index', $response);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insert()
    {
        $response['movement_type'] = new MovementType;

        return view('movement_type.form', $response);
    }

    /**
     * @param $movement_type_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($movement_type_id)
    {
        $response['movement_type'] = MovementType::find($movement_type_id);

        return view('movement_type.form', $response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $movement_type = MovementType::find($request->id) ?? new MovementType;

        $movement_type->description = $request->description;
        $movement_type->type = $request->type;

        $movement_type->save();

        return redirect()->route('movement_types.edit', ['movement_type_id' => $movement_type->id])->with('status', 'Registro salvo com sucesso!');
    }

    /**
     * @param $movement_type_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($movement_type_id)
    {
        if ($movement_type = MovementType::find($movement_type_id)) {
            $movement_type->delete();
        }

        return redirect()->route('movement_types.index')->with('status', 'Registro deletado com sucesso!');
    }
}
