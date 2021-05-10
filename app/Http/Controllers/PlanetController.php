<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanetRequest;
use App\Models\Planet;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PlanetController extends BaseController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $planets = Planet::get();

        return view('planets.index', compact('planets'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $successSave = $request->input('successSave');
        return view('planets.create', compact('successSave'));
    }

    /**
     * @param PlanetRequest $request
     * @return mixed
     */
    public function store(PlanetRequest $request)
    {
        $planet = new Planet();
        $planet->name = $request->input('name');
        $planet->description = $request->input('description');

        $successSave = false;
        if ($planet->save()) $successSave = true;

        return redirect(route('planets.create', compact('successSave')));
    }

    /**
     * @param $planet
     * @return mixed
     */
    public function show($planet)
    {
        $planet = Planet::find($planet);
        if (!$planet instanceof Planet) abort(404);

        return view('planets.show', compact('planet'));
    }

    /**
     * @param $planet
     * @param Request $request
     * @return mixed
     */
    public function edit($planet, Request $request)
    {
        $planet = Planet::find($planet);
        if (!$planet instanceof Planet) abort(404);

        $successSave = $request->input('successSave');

        return view('planets.edit', compact('planet', 'successSave'));
    }

    /**
     * @param $planet
     * @param PlanetRequest $request
     * @return mixed
     */
    public function update($planet, PlanetRequest $request)
    {
        $planet = Planet::find($planet);
        if (!$planet instanceof Planet) abort(404);

        $planet->name = $request->input('name');
        $planet->description = $request->input('description');

        $successSave = false;
        if ($planet->save()) $successSave = true;

        return redirect(route('planets.edit', [
            "planet" => $planet->id,
            "successSave" => $successSave
        ]));
    }
}
