<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Competency;
use Illuminate\Http\Request;

/**
 * Class FacultyController
 * @package App\Http\Controllers
 */
class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::paginate(15);

        return view('faculty.index', compact('faculties'))
            ->with('i', (request()->input('page', 1) - 1) * $faculties->perPage());
    }

    public function competencies($id)
    {
        $competencies = Competency::where('faculty_id',$id)->paginate();
        return view('competency.index', compact('competencies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculty = new Faculty();
        return view('faculty.create', compact('faculty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Faculty::$rules);

        $faculty = Faculty::create($request->all());

        return redirect()->route('faculties.index')
            ->with('success', 'Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faculty = Faculty::find($id);

        return view('faculty.show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = Faculty::find($id);

        return view('faculty.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Faculty $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        request()->validate(Faculty::$rules);

        $faculty->update($request->all());

        return redirect()->route('faculties.index')
            ->with('success', 'Faculty updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $faculty = Faculty::find($id)->delete();

        return redirect()->route('faculties.index')
            ->with('success', 'Faculty deleted successfully');
    }
}
