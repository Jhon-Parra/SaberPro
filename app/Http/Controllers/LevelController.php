<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

/**
 * Class LevelController
 * @package App\Http\Controllers
 */
class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::paginate();

        return view('level.index', compact('levels'))
            ->with('i', (request()->input('page', 1) - 1) * $levels->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level = new Level();
        return view('level.create', compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|integer|gt:0',
        ]);
        request()->validate(Level::$rules);

        $level = Level::create($request->all());

        return redirect()->route('levels.index')
            ->with('success', 'Level created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $level = Level::find($id);

        return view('level.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::find($id);

        return view('level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Level $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'number' => 'required|integer|gt:0',
        ]);
        request()->validate(Level::$rules);

        $level->update($request->all());

        return redirect()->route('levels.index')
            ->with('success', 'Level updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $level = Level::find($id)->delete();

        return redirect()->route('levels.index')
            ->with('success', 'Level deleted successfully');
    }
}
